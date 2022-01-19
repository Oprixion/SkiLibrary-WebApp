function sendEmail(){
    var nodemailer = require('nodemailer');
    var transporter = nodemailer.createTransport({
      service: 'hotmail',
      auth: {
        user: 'no-reply1914@outlook.com',
        pass: 'asdfghjkl123!!!'
      }
    });

    var mailOptions = {
      from: 'no-reply1914@outlook.com',
      to: 'sonlamngan2015@gmail.com',
      subject: 'Hello',
      text: 'That was easy!'
    };

    transporter.sendMail(mailOptions, function(error, info){
      if (error) {
        console.log(error);
      } else {
        console.log('Email sent: ' + info.response);
      }
    });
}