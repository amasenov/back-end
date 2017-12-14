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

app.get('/ingredients', function(request, response) {
    response.send(ingredients);
});

app.post('/ingredients', function(request, response) {
    var ingredient = request.body;
    if (!ingredient || ingredient.text === "") {
        response.status(500).send({error: "Your ingredient must have text"});
    } else {
        ingredients.push(ingredient);
        response.status(200).send(ingredients);
    }
});

app.delete('/ingredients/:ingredientId', function(request, response){
    var objFound = false;
    
    var newIngredients = ingredients.filter(function(ing) {
        if (ing.id === request.params.ingredientId) {
            objFound = true;
        }
        return ing.id !== request.params.ingredientId;
    });
    ingredients = newIngredients;

    if (!objFound) {
        response.status(500).send({error:"Ingredient id not found"});
    } else {
        response.send(ingredients);
    }
});

app.put('/ingredients/:ingredientId', function(request, response) {

    var newText = request.body.text;
    var newIngredients = [];
    if (!newText || newText === "") {
        response.status(500).send({error: "You must provide ingredient text"});
    } else {
        var objFound = false;
        newIngredients = ingredients.map(function(ing) {
            if(ing.id === request.params.ingredientId) {
                ing.text = newText;
                objFound = true;
            }
            return ing;
        });
        ingredients = newIngredients;

        if (!objFound) {
            response.status(500).send({error:"Ingredient id not found"});
        } else {
            response.send(ingredients);
        }
    }
});

app.listen(3000, function() {
    console.log("First API running on port 3000!");
});