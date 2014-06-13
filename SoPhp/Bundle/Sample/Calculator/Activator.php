<?php


namespace SoPhp\Bundle\Sample\Calculator;

use SoPhp\Framework\Activator\ActivatorInterface;
use SoPhp\Framework\Activator\Context\Context;
use SoPhp\ServiceRegistry\ServiceRegistration;

class Activator implements ActivatorInterface {
    const SERVICE_NAME = '\SoPhp\Bundle\Sample\CalculatorServiceInterface';
    /** @var  CalculatorService */
    protected $calculatorService;
    /** @var  ServiceRegistration */
    protected $registration;
    /**
     * @param Context $context
     */
    public function start(Context $context)
    {
        $registry = $context->getServiceRegistry();
        if($registry){

            $this->registration = $registry->register(self::SERVICE_NAME,
                $this->calculatorService = new CalculatorService());
            $context->getLogger()->info("Registered CalculatorService for CalculatorServiceInterface");
        }
    }

    /**
     * @param Context $context
     */
    public function stop(Context $context)
    {
        $registry = $context->getServiceRegistry();
        if($registry && $this->calculatorService){
            $registry->unregister($this->registration);
            $context->getLogger()->info("Unregistered CalculatorService for CalculatorServiceInterface");
        }
    }
}