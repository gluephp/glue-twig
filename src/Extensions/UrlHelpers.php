<?php namespace Glue\Twig\Extensions;

use Glue\Http\Request;
use Glue\Router\Router;
use Twig_Extension;
use Twig_SimpleFunction;

class UrlHelpers extends Twig_Extension
{
    /**
     * @var Glue\Router\Router
     */
    protected $router;

    /**
     * @var Glue\Http\Request
     */
    protected $request;


    /**
     * @param Glue\Router\Router $request
     * @param Glue\Http\Request  $router
     */
    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router  = $router;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'url_helpers';
    }


    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('route', [$this, 'route']),
        );
    }


    /**
     * Resolve a named route
     * 
     * @param  string  $name
     * @param  array   $params
     * @param  boolean $absolute    Return an absolute path
     * @return string|null
     */
    public function route($name, array $params = [], $absolute = false)
    {
        $route = $this->router->route($name, $params);
        return $absolute
            ? $this->request->getSchemeAndHttpHost() . $route
            : $route;
    }


}