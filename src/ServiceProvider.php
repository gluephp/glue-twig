<?php namespace Glue\Twig;

use Glue\App;
use Glue\Interfaces\ServiceProviderInterface;
use Twig_Loader_Filesystem;
use Twig_Environment;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(App $glue)
    {
        
        $glue->singleton('Twig_Environment', function($glue) {
            
            if (!$glue->config->exists('twig.path')) {
                // We need a default template folder
                throw new \Exception("You must set the twig.path");
            }
        
            // Instansiate Twig
            $loader = new Twig_Loader_Filesystem(
                $glue->config->get('twig.path'),
                $glue->config->get('twig.config', [])
            );
            
            $environment = new Twig_Environment($loader);
            
            // Register extensions
            $environment->addExtension(
                $glue->make('Glue\Twig\Extensions\UrlHelpers')
            );

            return $environment;

        });

        $glue->alias('Twig_Environment', 'twig');

    }
}