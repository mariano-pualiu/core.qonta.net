<?php

namespace Architecture\XmlSchemator\Parents\Models;

// use Apiato\Core\Abstracts\Models\Model as AbstractModel;

use Apiato\Core\Traits\CanOwnTrait;
use Apiato\Core\Traits\FactoryLocatorTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HashedRouteBindingTrait;
use Architecture\XmlSchemator\Analyzers\Xml\Transformers\Traits\XmlTransformerTrait;
use Architecture\XmlSchemator\Parents\Traits\MapperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as MongoDbEloquentModel;
use Sabre\Xml;
// use Architecture\XmlSchemator\Analyzers\Xml\Transformers\Traits;

abstract class Model extends MongoDbEloquentModel implements Xml\XmlDeserializable, Xml\XmlSerializable
{
    use MapperTrait;
    use HashIdTrait;
    use HashedRouteBindingTrait;
    use HasResourceKeyTrait;
    use HasFactory, FactoryLocatorTrait {
        FactoryLocatorTrait::newFactory insteadof HasFactory;
    }
    use CanOwnTrait;
    use XmlTransformerTrait;

    protected $connection = 'mongo';
}
