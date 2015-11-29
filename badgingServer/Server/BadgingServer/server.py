'''
/* ************* Begin file server2.py ***************************************/
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

################################# Import Libraries ################################

from __future__ import print_function
from __future__ import unicode_literals

import os.path
from bottle import route, run, response, static_file, request, error, Bottle, template
import json

from smartcard.scard import *
import smartcard.util

import logging

from geventwebsocket.handler import WebSocketHandler
from gevent import pywsgi
import gevent

import time

import reader

__version__ = 1	
			
def handle_echo_client(ws):
	while True:
		#msg = ws.receive()
		#if msg == "quit":
		#	ws.close_connection()
		#	break
		nfc_reader = reader.Reader()
		badge_id = nfc_reader.read_badge()
		ws.send(badge_id)
		nfc_reader.release_context()
		del nfc_reader
		time.sleep(1)
 
 
def app(environ, start_response):
	if environ['PATH_INFO'] == "/badge":
		handle_echo_client(environ['wsgi.websocket'])
	else:
		print ("404, PATH_INFO: %s" %  environ["PATH_INFO"])
		start_response("404 Not Found", [])
		return []
 
 
server = pywsgi.WSGIServer(('', 8889), app, handler_class=WebSocketHandler)
server.serve_forever()