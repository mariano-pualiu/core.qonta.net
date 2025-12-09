<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Rules\Parents;

use Architecture\XmlSchemator\Analyzers\Xml\Rules\Exceptions\XmlAttributeValidationRuleException;
use Closure;

// use Apiato\Core\Abstracts\Rules\Rule as AbstractRule;

abstract class AttributeRule /*extends AbstractRule*/
{
    public function handle($value, Closure $next)
    {
        return $this->validate($value)
            ? $next($value)
            : throw (new XmlAttributeValidationRuleException($this->message($value)))/*->debug($e)*/;
        ;
    }

    abstract protected function validate(mixed $value): bool;
}
