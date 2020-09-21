<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niche extends Model
{
    protected $guarded = [];
    public function shelf(){
        return $this->belongsTo(Shelf::class);
    }
}
