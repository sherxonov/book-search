<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    /**
     * @inheritdoc
     */
    protected $guarded = [];

    /**
     * Relation with Shelf model
     *
     * @return void
     */
    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }

    /**
     * Relation with Niche model
     *
     * @return void
     */
    public function niche()
    {
        return $this->belongsTo(Niche::class);
    }


    /**
     * Relation with Document model
     *
     * @return void
     */
    public function document()
    {
        return $this->hasMany(Document::class);
    }
}
