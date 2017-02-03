<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/1/17
	 * Time: 4:52 PM
	 */
	use Symfony\Component\HttpFoundation\Response;
	use FastRoute\RouteCollector;

	/* Import functions  */
	use function FastRoute\simpleDispatcher;

	/* Create and return a simple dispatch object */
	return simpleDispatcher(function (RouteCollector $r) use ($twig) {
		$r->addRoute('GET', '/', function () {
			$response = new Response('hello');
			$response->send();
		});
		$r->addRoute('GET', '/user', function () use ($twig) {

			/* Create the response object */
			$response = new Response(
				$twig->render('hello.twig', [
						'name' => 'Ankit'
					]
				)
			);

			/* Send response */
			$response->send();
		});

	});