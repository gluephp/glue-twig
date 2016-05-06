<?php namespace Glue\Twig;

use Twig_Environment;
use Glue\Interfaces\TemplateEngineInterface;

class Twig implements TemplateEngineInterface
{
    /**
     * @var Twig_Environment
     */
    protected $engine;


    /**
     * @param LTwig_Environment
     */
    public function __construct(Twig_Environment $engine)
    {
        $this->engine = $engine;
    }


    /**
     * Add a template folder
     * 
     * @param string $path       Absolute path to folder
     * @param string $namespace  Prefixed name
     */
    public function addTemplateFolder($path, $namespace = null)
    {
        $this->engine->addPath($namespace, $path);
    }
    
    
    /**
     * Render a template
     * 
     * @param  string $template
     * @param  array  $params
     * @return string
     */
    public function render($template, array $params = [])
    {
        return $this->engine->render($template, $params);
    }
    
    
    /**
     * Add global variables for all templates
     * 
     * @param array $data
     */
    public function sharedData(array $data = [])
    {
        foreach($data as $key => $value) {
            $this->engine->addGlobal($key, $value);
        }
        
    }
}