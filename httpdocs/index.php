<?php
    /**
     * Created by PhpStorm.
     * User: ankit
     * Date: 1/5/17
     * Time: 5:10 PM
     */

    require_once '../vendor/autoload.php';
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\Routing\Matcher\UrlMatcher;

    /**
     * @param $str
     * @param string $encoding
     * @return string
     */
    function noHTML($str, $encoding = 'UTF8')
    {
        return htmlentities($str, ENT_QUOTES | ENT_HTML5, $encoding);
    }

    /**
     * @param $param
     * @return Response
     */
    function render_template($param){
        extract($param->attributes->all(),EXTR_SKIP);
        ob_start();
        include '../src/views/' . $_route . '.php';
        return new Response(ob_get_clean());
    }

    /* Create a request */
    $request    = Request::createFromGlobals();

    /* Get the routesCollection route file */
    $routes     = include '../src/route.php';

    /* Create an instance of request context */
    $context    = new RequestContext();

    /* Create a context from the request */
    $context->fromRequest($request);

    /* Instantiate UrlMatcher */
    $matcher    = new UrlMatcher($routes, $context);
    try{
        $request->attributes->add($matcher->match($request->getPathInfo()));
        $response   = call_user_func($request->attributes->get('_controller'),$request);
    }catch (Symfony\Component\Routing\Exception\ResourceNotFoundException $e){
        $response   = new Response('Page not found', '404');
    }catch(Exception $e){
        $response   = new Response('An error occured', '500');
    }
    /* Set response */

    $response->send();


