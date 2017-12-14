var rs = require('readline-sync');
var print = require('./print');
var colors = require('colors');

var firstNum = rs.question('Please enter a number.'.yellow);
var secondNum = rs.question('Please enter another number.'.yellow);
var operatorItem = rs.question('Please enter an operator (+, - , / , * ).'.yellow);
var calculatedResult;

if (operatorItem == "+") {
    calculatedResult = "The result is: " + (firstNum + secondNum);
} else if (operatorItem == "-") {
    calculatedResult = "The result is: " + (firstNum - secondNum);
} else if (operatorItem == "*") {
    calculatedResult = "The result is: " + (firstNum * secondNum);
} else if (operatorItem == "/") {
    calculatedResult = "The result is: " + (firstNum / secondNum);
} else {
    calculatedResult = "Operation not found!";
}

print(String(calculatedResult).underline.red);

var name = rs.question('What is your name?'.cyan);

var printItem = "Your name is " + name;

print(printItem.green);