<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schema extends Model
{
    protected $fillable = [
    	'resource_id', 'name_schema', 'type_scehma', 'parent_id'
    ];

    public function schema() {
        return $this->belongsTo('App\Resource');
    }
}
