<?php
// We've created an index.php file
// In the following two lines, we are calling the two dependacies within the Slim which we are going to use of later 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';// This is compulsory for our framework to work, but don't worry too much about how it works

$app = AppFactory::create();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();

/*$app = new \Slim\App;// We create an object of the Slim framework main app

// Running the Slim framework, Get Method
$app->get('/books', function (Request $request, Response $response, array $args) {
  require_once 'connect.php';// Calling the database connection file

  $query = "SELECT * FROM shop";// SQL query
  $result = $conn->query($query);

  while ($row = $result->fetch_assoc()){// Loop through each field in the library table
      $data[] = $row;// Store each field in an array
  }
  
  return json_encode($data);// Translate this array into JSON
});

$app->run(); //this ensures that the code runs in Slim
*/

?>