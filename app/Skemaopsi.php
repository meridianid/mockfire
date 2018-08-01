<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skemaopsi extends Model
{
    protected $table = "skemaopsi";

    protected $fillable = [
    	'skemaopsigroup_id','option_grup', 'name_opsi', 'value_opsi'
    ];

    public function skemaopsigroup() {
        return $this->belongsTo('App\Skemaopsi');
    }
}
