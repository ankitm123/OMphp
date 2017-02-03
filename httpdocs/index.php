<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/3/17
	 * Time: 9:40 AM
	 */

	require_once '../Troodon/bootstrap.php';

	/* Create a troodon App */
	//$app = new App;
	/* Get http request method and URI from HTTPFoundation object  */
	$httpMethod = $request->getMethod();
	$uri = $request->getRequestUri();

	// Strip query string (?name=ankit) and decode URI
	if (false !== $pos = strpos($uri, '?')) {
		$uri = substr($uri, 0, $pos);
	}
	$uri = rawurldecode($uri);



	/* Dispatch the simple dispatcher object */
	$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

	switch ($routeInfo[0]) {
		case FastRoute\Dispatcher::NOT_FOUND:
			// Load 404 page
			break;
		case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
			$allowedMethods = $routeInfo[1];
			// Not sure what to do with this
			break;
		case FastRoute\Dispatcher::FOUND:
			$handler = $routeInfo[1];
			$vars = $routeInfo[2];
			// ... call $handler with $vars
			break;
	}




	//echo $view;