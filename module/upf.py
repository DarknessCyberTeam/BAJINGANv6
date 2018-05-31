#!/usr/bin/python
"""
It is Auxscan 2.0 module ( Robot Check )
"""
import sys, time, httplib

print ".  .   .        .  .__          .  .___      . "
print "|  |._ | _  _. _|  [__) _.._  _ |  [__ *._  _| _ ._. "
print "|__|[_)|(_)(_](_]  |   (_][ )(/,|  |   |[ )(_](/,[  "
print "    |                                              "
print
site00 = raw_input("[*] Site: ")
site = site00.replace("http://","").rsplit("/",1)[0] 
site = site.lower()

admin_path = ['editor/editor/filemanager/upload/test.html','portal/editor/editor/filemanager/upload/test.html','editor/editor/filemanager/connectors/test.html','editor/editor/filemanager/connectors/uploadtest.html','Kindeditor/examples/uploadbutton.html','kindeditor/examples/uploadbutton.html','wp-content/themes/u-design/scripts/admin/uploadify/uploadify.php','uploadify/uploadify.php','sites/default/files/up.php','index.php?option=com_fabrik&c=import&view=import&filetype=csv&table=1','index.php?option=com_fabrik&amp;c=import&amp;view=import&amp;filetype=csv&amp;tableid=1echercher','po-admin/js/plugins/uploader/upload.php','components/com_sexycontactform/fileupload/index.php','index.php?option=com_jdownloads&Itemid=1&view=upload','index.php?option=com_jdownloads&Itemid=1&task=upload','public_html/wp-content/themes/synoptic/lib/avatarupload/upload.php','wp-content/themes/eptonic/functions/jwpanel/scripts/valums_uploader/php.php']

print

try:
	for admin in admin_path:
		admin = admin.replace("\n","")
		admin = "/" + admin
		connection = httplib.HTTPConnection(site)
		connection.request("GET",admin)
		response = connection.getresponse()
		print "%s %s %s" % (admin, response.status, response.reason)
except(KeyboardInterrupt,SystemExit):
		raise
except:
		pass