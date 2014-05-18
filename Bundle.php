<?php


namespace SoPhp\Bundle\Calculator\Implementation;


use SoPhp\Bundle\Sample\Calculator\Activator;
use SoPhp\Framework\Activator\ActivatorInterface;
use SoPhp\Framework\Activator\Context\Context;
use SoPhp\Framework\Bundle\ActivatorProviderInterface;
use SoPhp\Framework\Bundle\AutoloaderProviderInterface;
use SoPhp\Framework\Bundle\BundleInterface;

class Bundle implements BundleInterface, AutoloaderProviderInterface, ActivatorProviderInterface {
    /** @var  Context */
    protected $context;

    /**
     * @param Context $context
     */
    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    /**
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }

    public function getAutoloader()
    {
        require_once __DIR__ . '/vendor/autoload.php';
    }


    /**
     * Should return a singleton instance of activator
     * @return ActivatorInterface
     */
    public function getActivator()
    {
        return new Activator();
    }
}