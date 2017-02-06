<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/4/17
	 * Time: 7:39 AM
	 */

	namespace Home\Controller;
	use Symfony\Component\HttpFoundation\Response;

	class HomeController
	{
		public function index()
		{
			$loader = new \Twig_Loader_Filesystem('../src/views');
			$twig = new \Twig_Environment($loader);
			$lexer = new \Twig_Lexer($twig, [
				'tag_block' => ['{', '}'],
				'tag_variable' => ['{{ ', '}}'],
			]);
			$twig->setLexer($lexer);
			$response = new Response(
				$twig->render('hello.twig', [
						'name' => 'Ankit'
					]
				)
			);
			$response->setStatusCode(200)->send();
		}

		public function edit()
		{
			echo 'edited';
		}
	}