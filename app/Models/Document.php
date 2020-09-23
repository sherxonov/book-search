<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * @inheritdoc
     */
    protected $guarded = [];

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
        return $this->belongsTo(Folder::class);
    }

}
