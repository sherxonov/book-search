<?php

namespace App\Services;

use App\Repository\DocumentRepository;
use App\Models\Document;
use App\Models\Shelf;

class DocumentService implements \App\Interfaces\ServiceInterface
{
    /**
     *Attribute for repository
     *
     * @var \App\Repository\DocumentRepository
     */
    public $repo;

    /**
     * Constructor
     *
     * @param DocumentRepository $documentRepository
     */
    public function __construct(DocumentRepository $documentRepository)
    {
        $this->repo = $documentRepository;
    }

    /**
     * @inheritdoc
     */
    public function create($attibutes)
    {
        return Document::create($attibutes);
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
     * Filter Document
     *
     * @param string $value
     * @return \App\Models\Document|null
     */
    public function filter($value)
    {
        return $this->repo->findByAttribute('name', '%'.$value.'%', 'like');
    }
    /**
     * @inheritdoc
     */
    public function shelf()
    {
        return Shelf::all();
    }

}
