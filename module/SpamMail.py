#!/usr/bin/python2

import sys, os
import smtplib as s

print "\n=========================================="
print "   Spammer Khusus Gmail"
print "=========================================="

username = raw_input("Name GmailMu: ")
password = raw_input("Pass GmailMu: ")

obj = s.SMTP("smtp.gmail.com:587")
obj.starttls()
obj.login(username, password)
print"\n\r"
v_email = raw_input("Email Target: ")
message = raw_input("Pesan Ke Target: ")
email_message = (" \r\n\r\n From: %s\r\n To: %s\r\n\r\n  %s"
% (username, "" .join(v_email), "" .join(message)))

while 1:
  obj.sendmail(username, v_email, email_message)
print ("Pesan Email Di Kirim! Sending another..! Press Ctrl + C to stop.!")