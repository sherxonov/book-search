<?php

namespace App\Services;

use App\Repository\FolderRepository;
use App\Models\Folder;

class FolderService implements \App\Interfaces\ServiceInterface
{
    /**
     *Attribute for repository
     *
     * @var \App\Repository\FolderRepository
     */
    public $repo;

    /**
     * Constructor
     *
     * @param FolderRepository $foldeerRepository
     */
    public function __construct(FolderRepository $folderRepository)
    {
        $this->repo = $folderRepository;
    }

    /**
     * @inheritdoc
     */
    public function create($attibutes)
    {
        return Folder::create($attibutes);
    }

    /**
     * @inheritdoc
     */
    public function update($id, $attibutes)
    {
        $model = $this->repo->findById($id);

        return $model->update();
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
