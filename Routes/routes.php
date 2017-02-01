<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/1/17
	 * Time: 4:52 PM
	 */
	include '../vendor/autoload.php';
	use FastRoute\RouteCollector;

	/* Import functions  */
	use function FastRoute\simpleDispatcher;

	/* Create a simple dispatch object */
	return simpleDispatcher(function (RouteCollector $r){
		$r->addRoute('GET','/user','handler');
	});