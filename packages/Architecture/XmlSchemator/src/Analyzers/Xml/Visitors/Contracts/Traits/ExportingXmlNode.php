<?php

namespace Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\Traits;

use Architecture\XmlSchemator\Analyzers\Xml\Enums\NodesEnum;
use Architecture\XmlSchemator\Analyzers\Xml\Values;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Contracts\ExporterVisitorContract;
use Architecture\XmlSchemator\Analyzers\Xml\Visitors\Exporters;
use Architecture\XmlSchemator\Values\ApiBuilderDirectorData;

trait ExportingXmlNode
{
	public function export(ExporterVisitorContract $exporter)
	{
		$exporter->export($this);

		return $this;
	}
}
