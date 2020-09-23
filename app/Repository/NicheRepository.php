<?php

namespace App\Repository;

use App\Models\Niche;

class NicheRepository implements \App\Interfaces\RepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getAll()
    {
        $items = Niche::all();

        return $items;
    }

    /**
     * @inheritdoc
     */
    public function findByAttribute($attibute, $value, $type = '=')
    {
        $item = Niche::where($attibute, $type, $value)->get();

        return $item;
    }

    /**
     * @inheritdoc
     */
    public function findById($id)
    {
        return Niche::find($id);
    }
}
