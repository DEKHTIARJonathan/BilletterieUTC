'''
/* ************* Begin file loadConf.py ***************************************/
/*
** 2015 November 27
**
** In place of a legal notice, here is a blessing:
**
**    May you do good and not evil.
**    May you find forgiveness for yourself and forgive others.
**    May you share freely, never taking more than you give.
**
*************************************************************************/

/**
*	\file loadConf.py
*	\brief Configuration Loading File
*	\version 1.0
*	\author Jonathan DEKHTIAR - contact@jonathandekhtiar.eu - @born2data - http://www.jonathandekhtiar.eu
*/
'''

################################# Import Libraries ################################
import os.path
import xml.etree.ElementTree as XML

def loadDBConf(confPath = '../Config/conf.xml'):
	configurations = XML.parse(confPath).getroot()

	servers = dict()

	for serv in configurations.iter('DBserver'):
	
		serverName = serv.attrib['serverName']
		serverPort = serv.attrib['port']
		serverIP = serv.attrib['ip']
		dbUser = serv.attrib['dbUser']
		dbPass = serv.attrib['dbPass']
		dbName = serv.attrib['dbName']
		
		servers[serverName] = {'ip':serverIP, 'port':serverPort, 'dbUser':dbUser, 'dbPass':dbPass, 'dbName':dbName }
		
	return servers
	
def loadAPIConf(confPath = '../Config/conf.xml'):
	configurations = XML.parse(confPath).getroot()

	servers = dict()

	for serv in configurations.iter('APIserver'):
	
		serverName = serv.attrib['serverName']
		serverPort = serv.attrib['port']
		serverIP = serv.attrib['ip']
		serverLocal = serv.attrib['local']
		
		servers[serverName] = {'ip':serverIP, 'port':serverPort, 'local':str2bool(serverLocal)}
		
	return servers
	
def str2bool(v):
  return v.lower() == "true"