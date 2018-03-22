<?php

    ini_set('display_errors', true);
 
    require __DIR__ . '/../vendor/autoload.php';
	require_once '../include/DbHandler.php';

 
    use Slim\App;

	// Use the PSR-7 HTTP Messages interfaces
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
	 
    // We now get a new instance/Object of slim app itself we can name `$app`    
    $app = new App();
 
	 
	$app->get('/cabs', function(Request $request, Response $response, $args) {         
				$db = new DbHandler();
				$responses = array();
				$msg = $db->getAllData();                 				
				$responses["error"] = false;
				$responses["message"] = $msg;
				$response->write(json_encode($responses));
				$newResponse = $response
								->withHeader('Content-type', 'application/json')
								->withHeader('Access-Control-Allow-Origin', '*')
								->withStatus(200);
				return  $newResponse ;							
	});
  
    $app->get('/cabs/{number}', function(Request $request, Response $response, $args) {         
				$db = new DbHandler();
				$responses = array();
				$body = $request->getBody();
				$formData = json_decode($body,1);
				$number = $request->getAttribute('number');				
				$msg = $db->getOneData($number);                 				
				$responses["error"] = false;
				$responses["message"] = $msg;
				$response->write(json_encode($responses));
				$newResponse = $response
								->withHeader('Content-type', 'application/json')
								->withHeader('Access-Control-Allow-Origin', '*')
								->withStatus(200);
				return  $newResponse ;							
	});
	
	
  
    $app->get('/cabs/nearby/{location_value}', function(Request $request, Response $response, $args) {         
				$db = new DbHandler();
				$responses = array();
				$body = $request->getBody();
				$formData = json_decode($body,1);
				$location_value = $request->getAttribute('location_value');				
				$msg = $db->getNearbyCabs($location_value);                 				
				$responses["error"] = false;
				$responses["message"] = $msg;
				$response->write(json_encode($responses));
				$newResponse = $response
								->withHeader('Content-type', 'application/json')
								->withHeader('Access-Control-Allow-Origin', '*')
								->withStatus(200);
				return  $newResponse ;							
	});
		
	
  	$app->post('/cabs/book', function(Request $request, Response $response, $args) {         
				$db = new DbHandler();
				$responses = array();
				$body = $request->getBody();
	 			$cab_number = $request->getParam('cab_number');
				$msg = $db->bookNearbyCab($cab_number);                 				
				$responses["error"] = false;
				$responses["message"] = $msg;
				$response->write(json_encode($responses));
				$newResponse = $response
								->withHeader('Content-type', 'application/json')
								->withHeader('Access-Control-Allow-Origin', '*')
								->withStatus(200);
				return  $newResponse ;							
	});
	
	$app->post('/calculate/fare', function(Request $request, Response $response, $args) {         
				$db = new DbHandler();
				$responses = array();
				$body = $request->getBody();
	 			$travelTime = $request->getParam('travel_time');
				$travelDistance = $request->getParam('travel_distance');
				$msg = $db->calculateFare($travelDistance,$travelTime);                 				
				$responses["error"] = false;
				$responses["message"] = $msg;
				$response->write(json_encode($responses));
				$newResponse = $response
								->withHeader('Content-type', 'application/json')
								->withHeader('Access-Control-Allow-Origin', '*')
								->withStatus(200);
				return  $newResponse ;							
	});

	$app->run();