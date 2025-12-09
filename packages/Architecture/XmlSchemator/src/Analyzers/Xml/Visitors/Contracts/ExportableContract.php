<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts;

use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;

interface ExportableContract
{
	public function export(ExporterVisitorContract $visitor);
}
