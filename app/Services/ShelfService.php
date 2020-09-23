<?php

namespace App\Services;

use App\Models\Shelf;
use App\Repository\ShelfRepository;

class ShelfService implements \App\Interfaces\ServiceInterface
{
    /**
     *Attribute for repository
     *
     * @var \App\Repository\ShelfRepository
     */
    public $repo;

    /**
     * Constructor
     *
     * @param ShelfRepository $shelfRepository
     */
    public function __construct(ShelfRepository $shelfRepository)
    {
        $this->repo = $shelfRepository;
    }

    /**
     * @inheritdoc
     */
    public function create($attibutes)
    {
        return Shelf::create($attibutes);
    }

    /**
     * @inheritdoc
     */
    public function update($id, $attibutes)
    {
        $model = $this->repo->findById($id);

        return $model->update($attibutes);
    }

    /**
     * @inheritdoc
     */
    public function delete($id)
    {
        $model = $this->repo->findById($id);

        return $model->delete();
    }

    /**
     * @inheritdoc
     */
    public function read($id)
    {
        $model = $this->repo->findById($id);

        return $model;
    }

}
