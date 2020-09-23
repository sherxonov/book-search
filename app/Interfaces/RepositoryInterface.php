<?php

namespace App\Interfaces;

/**
 * Interface for Repository
 */
interface RepositoryInterface
{
    /**
     * Find by ID
     *
     * @param integer $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Find by attribute
     *
     * @param string $attibute
     * @param string $value
     * @param string $type
     * @return mixed
     */
    public function findByAttribute($attibute, $value, $type = '=');

    /**
     * Get all items
     *
     * @return mixed
     */
    public function getAll();

}
