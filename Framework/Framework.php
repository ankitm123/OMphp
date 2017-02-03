<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/3/17
	 * Time: 9:22 AM
	 */

	namespace Troodon;
	use FastRoute\Dispatcher;

	class Framework{
		protected $routeInfo;
		protected $handler;
		protected $vars;

		public function __construct($dispatcher, $httpMethod, $uri)
		{
			/* Dispatch the dispatcher, a.k.a. match against the route collections */
			$this->routeInfo = $dispatcher->dispatch($httpMethod, $uri);

			/* Get the status code from the match, and handle the request */
			switch ($this->routeInfo[0]) {
				case Dispatcher::NOT_FOUND:
					// Send 404 status code
					// Load 404 page
					break;
				case Dispatcher::METHOD_NOT_ALLOWED:
					echo $this->routeInfo[1];

					// Not sure what to do with this
					break;
				case Dispatcher::FOUND:
					if(is_callable($this->routeInfo[1])){
						$this->routeInfo[1]();
					}
					$this->vars = $this->routeInfo[2];

					// ... call $handler with $vars
					break;
			}
		}
	}

//	use werx\Config\{Providers\ArrayProvider, Container};
//
