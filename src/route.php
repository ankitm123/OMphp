<?php
    /**
     * Created by PhpStorm.
     * User: ankit
     * Date: 1/8/17
     * Time: 3:48 PM
     */
    use Symfony\Component\Routing\RouteCollection;
    use Symfony\Component\Routing\Route;

    /* Create an instance of Route collection */
    $routes     = new RouteCollection();

    /* Add routes */
    $routes->add('hello', new Route('/hello/{name}', array(
        'name'          => 'World',
        '_controller'   => function($param){
            return render_template($param);
        }
    )));
    $routes->add('bye', new Route('/bye/{name}', array(
        'name' => 'World',
        '_controller'   => function($param){
            return render_template($param);
        }
    )));

    /* return the routes, to be used in the index file */
    return $routes;