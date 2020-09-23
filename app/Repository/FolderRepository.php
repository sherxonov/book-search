<?php

namespace App\Repository;

use App\Models\Folder;

class FolderRepository implements \App\Interfaces\RepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getAll()
    {
        $items = Folder::all();

        return $items;
    }

    /**
     * @inheritdoc
     */
    public function findByAttribute($attibute, $value)
    {
        $item = Folder::where($attibute, $value)->get();

        return $item;
    }

    /**
     * @inheritdoc
     */
    public function findById($id)
    {
        return Folder::find($id);
    }
}
