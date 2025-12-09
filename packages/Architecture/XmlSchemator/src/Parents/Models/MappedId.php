<?php

namespace Architecture\XmlSchemator\Parents\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class MappedId extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'mapping_key',
        'original_id',
        'numeric_id',
    ];

    // public static $objectIdMappingPrefix = 'objectid:mapping';
    // public static $numericIdMappingPrefix = 'numericid:mapping';
}
