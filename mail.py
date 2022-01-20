from simplegmail import Gmail

gmail = Gmail() # will open a browser window to ask you to log in and authenticate

params = {
  "to": "jacob.le.baxter@gmail.com",  # must be authorized 
  "sender": "jacob.le.baxter@gmail.com",
  "subject": "Are you paying to much for you car insurance?",
  "msg_plain": "I am a literal god.",
  "attachments":  ["waiver.xml"]
  
}
message = gmail.send_message(**params)  # equivalent to send_message(to="you@youremail.com", sender=...)