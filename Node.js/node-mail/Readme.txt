Main link: https://developers.google.com/gmail/api/quickstart/nodejs
Additional link: https://stackoverflow.com/questions/45122313/nodemailer-send-mail-with-google-service-account-fails-because-username-and-p

Step 1: Turn on the Gmail API.
	ENABLE THE GMAIL API
	a. Select + Create a new project.
	b. Download the configuration file.
	c. Move the downloaded file to your working directory and ensure it is named credentials.json.
Step 2: Install the client library.
	Run the following commands to install the libraries using npm:
	'npm install googleapis@27 --save'
Step 3: Set up the sample.
	Create a file named quickstart.js in your working directory and copy the code:
Step 4: Run the sample.
	Run the sample using the following command:
	node quickstart.js
	The first time you run the sample, it will prompt you to authorize access:
	Browse to the provided URL in your web browser.
	If you are not already logged into your Google account, you will be prompted to log in. If you are logged into multiple Google accounts, you will be asked to select one account to use for the authorization.
	Click the Accept button.
	Copy the code you're given, paste it into the command-line prompt, and press Enter.
Step 5: Use refresh_token from the newly created token.json file.
	NOTE: access_token's have a lifespan of 1 hour. refresh_token's are immortal.