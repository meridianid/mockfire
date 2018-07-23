<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'id','user_id','name_project', 'endpoint'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
