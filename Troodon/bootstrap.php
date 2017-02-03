<?php
	/**
	 * Created by PhpStorm.
	 * User: ankit
	 * Date: 2/2/17
	 * Time: 9:51 PM
	 */
	require '../vendor/autoload.php';
	require 'App.php';

	use Symfony\Component\HttpFoundation\{Request,Response};
	use werx\Config\{Providers\ArrayProvider, Container};

	$request    = Request::createFromGlobals();

	/* Get the list of routes */
	$dispatcher = include_once '../routes/routes.php';

	$loader = new Twig_Loader_Filesystem('../src/views');
	$twig = new Twig_Environment($loader);

	$md5Filter = new Twig_SimpleFilter('md5',function($string){
		return md5($string);
	});

	$twig->addFilter($md5Filter);

	$lexer = new Twig_Lexer($twig,[
		'tag_block' => ['{','}'],
		'tag_variable' => ['{{ ','}}'],
	]);

	$twig -> setLexer($lexer);

	$view = $twig->render('hello.html',[
		'name' => 'Ankit',
		'age' => '2',
		'users' => [
			[
				'name' => 'Ankit',
				'age' => '26'
			],
			[
				'name' => 'Jiri',
				'age' => '23'
			],
			[
				'name' => 'Qiao',
				'age' => '25'
			]
		]
	]);





