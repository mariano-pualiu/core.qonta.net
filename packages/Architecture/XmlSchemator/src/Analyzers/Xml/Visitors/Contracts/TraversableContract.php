<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts;

use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\TraverserVisitorContract;

interface TraversableContract
{
	public function traverse(TraverserVisitorContract $visitor);
}
