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
    public function findByAttribute($attibute, $value, $type = '=')
    {
        $item = Folder::where($attibute, $type, $value)->get();

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
