<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
    	'id','project_id', 'name_resource', 'type'
    ];

    public function resource() {
        return $this->belongsTo('App\Project');
    }
}
