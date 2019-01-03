'use strict';
const express = require('express');
const bodyParser = require('body-parser');
const exphbs = require('express-handlebars');
const path = require('path');
const nodemailer = require('nodemailer');
const auth = require('./auth');

const app = express();

// View engine setup
// app.engine('handlebars', exphbs());
// app.set('view engine', 'handlebars');

// Static folder
app.use('/public', express.static(path.join(__dirname, 'public')));

app.use((req, res, next) => {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
	next();
  });

// Body Parser Middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// app.get('/', (req,res) => {
// 	// res.send('Hello world!');
// 	res.render('contact');
// });

app.post('/send', (req, res) => {
	const output = `
	<p>You have a new contact request</p>
	<h3>Contact Details</h3>
	<ul>  
		<li>Name: ${req.body.fname} ${req.body.lname}</li>
		<li>Phone: ${req.body.number}</li>
		<li>Email: ${req.body.email}</li>
	</ul>
	<h3>Message</h3>
	<p>${req.body.message}</p>
	`;

	let transporter = nodemailer.createTransport({
		host: 'smtp.gmail.com',
		port: 465,
		secure: true,
		auth: auth.transporter
	});

	// setup email data with unicode symbols
	let mailOptions  = {
		from: `From ${req.body.fname} ${req.body.lname} <${req.body.email}>`, // sender address
		to: '***RECEIVER EMAIL***', // list of receivers
		subject: 'Contact form message', // Subject line
		text: `Phone number: ${req.body.phone}, Message: ${req.body.message}`, // plain text body
		html: output, // html body
		auth: auth.mailOptions
	};

	// send mail with defined transport object
	transporter.sendMail(mailOptions , (error, info) => {
		if (error) {
			res.status(500).send(error);
			return console.log(error);
		}
		
		res.status(200).send({message:'Email has been sent', success: true});
	});
});

// Start the server
const PORT = process.env.PORT || 8080;
app.listen(PORT, () => {
	console.log(`App listening on port ${PORT}`);
	console.log('Press Ctrl+C to quit.');
});