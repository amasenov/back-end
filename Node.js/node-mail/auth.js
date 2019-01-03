module.exports = {
  transporter: {
    type : 'OAuth2',
    // scope : "https://www.googleapis.com/auth/gmail.send",
    clientId : '***GOOGLE_APP_CLIENT_ID***',
    clientSecret: '***GOOGLE_APP_CLIENT_SECRET***'
  },
  mailOptions: {
    user : '***GOOGLE_EMAIL***',
    refreshToken: '***GOOGLE_APP_REFRESH_TOKEN***'
  }
};
