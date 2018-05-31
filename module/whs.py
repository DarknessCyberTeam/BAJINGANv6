#!/usr/bin/python
"""
It is Auxscan 2.0 module ( WhoIs Lookup )
"""
from urllib2 import *

print "      .           .      .         "
print ".    ,|_  _ * __  | _  _ ;_/. .._  "
print " \/\/ [ )(_)|_)   |(_)(_)| \(_|[_) "
print "                               |   "
print
target = raw_input("Target (Domain/IP): ")
hackertarget = "http://api.hackertarget.com/whois/?q=" + target
hackertarget = urlopen(hackertarget).read()
print (hackertarget)