<?php
/**
 * Callable Object
 *
 * @author Whizark <devaloka@whizark.com>
 * @see http://whizark.com
 * @copyright Copyright (C) 2014 Whizark.
 * @license MIT
 */

namespace Devaloka\EventConverter;

/**
 * Class CallableObject
 *
 * @author Whizark
 */
class CallableObject
{
    /**
     * @var callable The callable.
     */
    private $callable = null;

    /**
     * Constructor.
     *
     * @param callable $callable A callable.
     */
    public function __construct(callable $callable)
    {
        if (is_string($callable) && strpos($callable, '::') !== false) {
            $callable = explode('::', $callable);
        }

        $this->callable = $callable;
    }

    /**
     * Invokes the callable with parameter(s).
     *
     * @return mixed The return value.
     */
    public function __invoke()
    {
        return $this->invokeArgs(func_get_args());
    }

    /**
     * Invokes the callable with an array of parameter(s).
     *
     * @param array $parameters The parameter(s) to be passed to the callable.
     *
     * @return mixed The return value.
     */
    public function invokeArgs(array $parameters = [])
    {
        return call_user_func_array($this->callable, $parameters);
    }

    /**
     * Invokes the callable with parameter(s).
     *
     * @return mixed The return value.
     */
    public function invoke()
    {
        return $this->invokeArgs(func_get_args());
    }

    /**
     * Returns the raw callable.
     *
     * @return callable The callable.
     */
    public function get()
    {
        return $this->callable;
    }

    /**
     * Returns whether the callable is overloadable.
     *
     * @return bool True if it is overloadable, false otherwise.
     */
    public function isOverloadable()
    {
        if (($this->isInstanceMethod() || $this->isClassMethod()) &&
            !$this->exists() && is_callable([$this->callable[0], '__call'])
        ) {
            return true;
        }

        return false;
    }

    /**
     * Returns whether the callable is an instance method.
     *
     * @return bool True if it is an instance method, false otherwise.
     */
    public function isInstanceMethod()
    {
        return is_array($this->callable) && is_object($this->callable[0]);
    }

    /**
     * Returns whether the callable is a class method.
     *
     * @return bool True if it is a class method, false otherwise.
     */
    public function isClassMethod()
    {
        return is_array($this->callable) && is_string($this->callable[0]);
    }

    /**
     * Returns whether the callable actually exists.
     *
     * @return bool True if it exists, false otherwise.
     */
    public function exists()
    {
        if ($this->isFunction() || $this->isClosure()) {
            return true;
        }

        if (($this->isInstanceMethod() || $this->isClassMethod())
            && method_exists($this->callable[0], $this->callable[1])
        ) {
            return true;
        }

        return false;
    }

    /**
     * Returns whether the callable is a function.
     *
     * @return bool True if it is a function, false otherwise.
     */
    public function isFunction()
    {
        return is_string($this->callable);
    }

    /**
     * Returns whether the callable is a closure.
     *
     * @return bool True if it is a Closure, false otherwise.
     */
    public function isClosure()
    {
        return is_object($this->callable);
    }
}
