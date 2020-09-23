<?php

namespace App\Models;

use App\Models\Niche;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Shelf extends Model
{
    /**
    *@inheritdoc
    */
    protected $guarded = [];

    /**
     * Relation with Niche model
     *
     * @return void
     */
    public function niche()
    {
        return $this->hasMany(Niche::class);
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
