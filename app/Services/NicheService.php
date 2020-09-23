<?php

namespace App\Services;

use App\Models\Niche;
use App\Models\Shelf;
use App\Repository\NicheRepository;

class NicheService implements \App\Interfaces\ServiceInterface
{
    /**
     *Attribute for repository
     *
     * @var \App\Repository\NicheRepository
     */
    public $repo;

    /**
     * Constructor
     *
     * @param NicheRepository $nicheRepository
     */
    public function __construct(NicheRepository $nicheRepository)
    {
        $this->repo = $nicheRepository;
    }

    /**
     * @inheritdoc
     */
    public function create($attibutes)
    {
        return Niche::create($attibutes);
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

    /**
     * @inheritdoc
     */
    public function shelves($id)
    {
        return Shelf::all();
    }

}
