<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceFile extends Model
{
    protected $table = 'resource_file';

    /**
     * One to many relationship with ResourceFile
     * ResourceFile belongsTo Resource
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resource()
    {
        return $this->belongsTo('App\Resource','resource_id','id');
    }


}
