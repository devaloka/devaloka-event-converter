<?php
/**
 * Filter Function Parameter
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2014 Whizark.
 * @license MIT
 */

namespace Devaloka\EventConverter;

use ReflectionParameter;

/**
 * Class FilterFunctionParameter
 *
 * @package Devaloka\EventConverter
 */
class FilterFunctionParameter
{
    private $parameter;

    public function __construct(CallableObject $callable, $parameter)
    {
        $rawCallable = $callable->get();

        if ($callable->isInstanceMethod() || $callable->isClassMethod()) {
            $object = $rawCallable[0];
            $method = $rawCallable[1];

            if ($callable->isOverloadable()) {
                $method = '__call';
            }

            $rawCallable = [$object, $method];
        }

        $this->parameter = new ReflectionParameter($rawCallable, $parameter);
    }

    public function getParameter()
    {
        return $this->parameter;
    }

    public function allowsOnlyClass($acceptedClass)
    {
        $class = $this->parameter->getClass();

        if ($class === null) {
            return false;
        }

        if ($class->name === $acceptedClass) {
            return true;
        }

        if ($class->isSubclassOf($acceptedClass)) {
            return true;
        }

        return false;
    }

    public function isPassedByReference()
    {
        return $this->parameter->isPassedByReference();
    }
}
