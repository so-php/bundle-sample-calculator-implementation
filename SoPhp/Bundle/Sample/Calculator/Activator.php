<?php


namespace SoPhp\Bundle\Sample\Calculator;

use SoPhp\Framework\Activator\ActivatorInterface;
use SoPhp\Framework\Activator\Context\Context;

class Activator implements ActivatorInterface {
    const SERVICE_NAME = 'SoPhp\Bundle\Sample\CalculatorServiceInterface';
    /** @var  CalculatorService */
    protected $calculatorService;
    /**
     * @param Context $context
     */
    public function start(Context $context)
    {
        $registry = $context->getServiceRegistry();
        if($registry){

            $registry->registerService(self::SERVICE_NAME,
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
            $registry->unregisterService(self::SERVICE_NAME,
                $this->calculatorService);
            $context->getLogger()->info("Unregistered CalculatorService for CalculatorServiceInterface");
        }
    }
}