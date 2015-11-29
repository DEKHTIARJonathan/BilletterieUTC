'''
/* ************* Begin file api.py ***************************************/
/*
** 2015 November 28
**
** In place of a legal notice, here is a blessing:
**
**	May you do good and not evil.
**	May you find forgiveness for yourself and forgive others.
**	May you share freely, never taking more than you give.
**
*************************************************************************/

/**
*	\file api.py
*	\brief Bottle Server API File
*	\version 1.0
*	\author Jonathan DEKHTIAR - contact@jonathandekhtiar.eu - @born2data - http://www.jonathandekhtiar.eu
*/
'''

from __future__ import print_function
from __future__ import unicode_literals

import os.path
from smartcard.scard import *
import smartcard.util
import json
import time

__version__ = 1


class Reader:
	"""
		Manipulate the nfc reader
	"""
	def __init__(self):
		print("Reader() get_context...")
		self.init_context()
		self.init_reader()

	def read_badge(self):
		badge_id = None
		
		while not badge_id:
			try:
				hresult, hcard, dwActiveProtocol = SCardConnect(self.context, self.reader,
					SCARD_SHARE_SHARED, SCARD_PROTOCOL_T0 | SCARD_PROTOCOL_T1)
				if hresult != SCARD_S_SUCCESS:
					raise Exception('Unable to connect: ' +
						SCardGetErrorMessage(hresult))
				print('Connected with active protocol', dwActiveProtocol)
				
				hresult = SCardBeginTransaction(hcard)
				if hresult != SCARD_S_SUCCESS:
					raise error, 'failed to begin transaction: ' + SCardGetErrorMessage(hresult)

				hresult, response = SCardTransmit(hcard, dwActiveProtocol,[0xFF, 0xCA, 0x00, 0x00, 0x00])
				if hresult != SCARD_S_SUCCESS:
					raise Exception('Failed to transmit: ' +
						SCardGetErrorMessage(hresult))
				badge_id = smartcard.util.toHexString(response, smartcard.util.HEX).replace("0x","").split(" ")
				
				badge_id.pop()
				badge_id.pop()
				badge_id = "".join(badge_id)
				print('Find badge: ' + badge_id)
			
				hresult = SCardDisconnect(hcard, SCARD_EJECT_CARD)
				if hresult != SCARD_S_SUCCESS:
					raise Exception('Failed to disconnect: ' +
						SCardGetErrorMessage(hresult))
				print('Disconnected')
				
				hresult = SCardEndTransaction(hcard, SCARD_EJECT_CARD)
				if hresult != SCARD_S_SUCCESS:
					raise error, 'failed to end transaction: ' + SCardGetErrorMessage(hresult)
			except:
				pass
		
			
		return badge_id

	def init_context(self):
		hresult, hcontext = SCardEstablishContext(SCARD_SCOPE_USER)
		if hresult != SCARD_S_SUCCESS:
			raise Exception('Failed to establish context : ' +
				SCardGetErrorMessage(hresult))
		print('Context established!')
		self.context = hcontext

	def init_reader(self):
		print("Search readers...")
		hresult, readers = SCardListReaders(self.context, [])
		if hresult != SCARD_S_SUCCESS:
			raise Exception('Failed to list readers: ' +
				SCardGetErrorMessage(hresult))
		print('PCSC Readers:', readers)

		if len(readers) < 1:
			raise Exception('No smart card readers')

		self.reader = readers[0]
		print("Using reader:", self.reader)

	def release_context(self):
		hresult = SCardReleaseContext(self.context)
		if hresult != SCARD_S_SUCCESS:
			raise Exception('Failed to release context: ' +
					SCardGetErrorMessage(hresult))
		print('Released context.')