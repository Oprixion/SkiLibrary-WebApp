"""
This file uses the simplegmail client API, modified and used under MIT license, Copyright (c) 2018 Jeremy Ephron Barenholtz

Emails an attachment corresponding to the first parameter passed when executing
this script via command line
"""

from simplegmail import Gmail
import sys

attachment = sys.argv[1]

gmail = Gmail() # will open a browser window to ask you to log in and authenticate 

params = {
  "to": "jacob.le.baxter@gmail.com",  # must be authorized 
  "sender": "jacob.le.baxter@gmail.com",
  "subject": "Waiver; New Patron",
  "msg_plain": attachment + " received",
  "attachments":  [attachment]
  
}
message = gmail.send_message(**params)  # equivalent to send_message(to="you@youremail.com", sender=...)