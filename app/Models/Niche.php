<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niche extends Model
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
     * Relation with Folder model
     *
     * @return void
     */
    public function folder()
    {
        return $this->hasMany(Folder::class);
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
