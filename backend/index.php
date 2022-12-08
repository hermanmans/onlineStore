<?php
// We've created an index.php file
// In the following two lines, we are calling the two dependacies within the Slim which we are going to use of later 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';// This is compulsory for our framework to work, but don't worry too much about how it works

$toep = new Toep;// We create an object of the Slim framework main app

var_dump ($toep); ///////////////////TEST tos see if slim works




// Running the Slim framework, Get Method
$app->get('/books', function (Request $request, Response $response, array $args) {// first parameter defines the URL that this GET request endpoint shall point to
    require_once 'connect.php';// Calling the database connection file

    $query = "select * from shopdev";// SQL query
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()){// Loop through each field in the library table
        $data[] = $row;// Store each field in an array
    }
    
    return json_encode($data);// Translate this array into JSON
});

$app->run(); //this ensures that the code runs in Slim