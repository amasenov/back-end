var express = require('express');
var app = express();
var bodyParser = require('body-parser');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

var ingredients = [
    {
        "id":"303aMa",
        "text":"Pasta"
    },
    {
        "id":"xkY973",
        "text":"Cheese"
    },
    {
        "id":"jpCu48",
        "text":"Bacon"
    },
    {
        "id":"pt34JL1",
        "text":"Mushroom"
    }
];

app.get('/', function(request, response) {
    response.send(ingredients);
});

app.post('/', function(request, response) {
    var ingredient = request.body;
    if (!ingredient || ingredient.text === "") {
        response.status(500).send({error: "Your ingredient must have text"});
    } else {
        ingredients.push(ingredient);
        response.status(200).send(ingredients);
    }
});

app.listen(3000, function() {
    console.log("First API running on port 3000!");
});