<?php

namespace App\Repository;

use App\Models\Document;
use App\Models\Shelf;

class DocumentRepository implements \App\Interfaces\RepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getAll()
    {
        $items = Document::all();
        $shelf = Shelf::all();
        return [$items, $shelf];
    }

    /**
     * @inheritdoc
     */
    public function findByAttribute($attibute, $value, $type = '=')
    {
        $item = Document::where($attibute, $type, $value)->get();

        return $item;
    }

    /**
     * @inheritdoc
     */
    public function findById($id)
    {
        return Document::find($id);
    }
}
