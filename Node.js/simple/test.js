var rs = require('readline-sync');
var print = require('./print');
var colors = require('colors');

var firstNum = 30;
var secondNum = 20;

print(firstNum + secondNum.underline);

console.log('This is red text'.underline.red);

var name = rs.question('What is your name?'.cyan);

var printItem = "Your name is " + name;

print(printItem.green);