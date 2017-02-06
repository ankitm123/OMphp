<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/3/17
	 * Time: 9:22 AM
	 */

	namespace Troodon;

	use FastRoute\Dispatcher;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\HttpKernel;
	use Home\Controller\HomeController;

	class Framework
	{
		protected $routeInfo;
		protected $handler;
		protected $vars;

		public function __construct($dispatcher, $httpMethod, $uri, $twig, $request)
		{
			/* Dispatch the dispatcher, a.k.a. match against the route collections */
			$this->routeInfo = $dispatcher->dispatch($httpMethod, $uri);

			/* Get the status code from the match, and handle the request */
			switch ($this->routeInfo[0]) {
				case Dispatcher::NOT_FOUND:
					(new Response($twig
						->render('404.twig')))
						->setStatusCode(404)
						->send();
					break;
				case Dispatcher::METHOD_NOT_ALLOWED:
					//Do something here (500?)
					break;
				case Dispatcher::FOUND:
					$controllerResolver = new HttpKernel\Controller\ControllerResolver();
					$argumentResolver = new HttpKernel\Controller\ArgumentResolver();
					$request->attributes->add($this->routeInfo[1]);
					$controller = $controllerResolver->getController($request);
					$arguments = $argumentResolver->getArguments($request, $controller);
					return call_user_func_array($controller, $arguments);
					break;
			}
		}
	}

	//
	//
