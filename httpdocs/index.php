<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/3/17
	 * Time: 9:40 AM
	 */

	/* This file should receive the request and delegate it to the framework class */

	require_once '../vendor/autoload.php';
	use Symfony\Component\HttpFoundation\Request;
	use werx\Config\{Providers\ArrayProvider, Container};



	$request    = Request::createFromGlobals();

	/* Get HTTP Method */
	$httpMethod = $request->getMethod();

	/* Identify the request */
	$uri = $request->getRequestUri();

	if (false !== $pos = strpos($uri, '?')) {
		$uri = substr($uri, 0, $pos);
	}
	$uri = rawurldecode($uri);

	/* Get the list of routes */
	$dispatcher = include_once '../routes/routes.php';


	/* Instantiate the framework class in Troodon namespace */
	$app = new Troodon\Framework($dispatcher, $httpMethod, $uri, $request);
