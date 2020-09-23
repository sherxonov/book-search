<?php

namespace App\Interfaces;

/**
 * Interface for Service
 */
interface ServiceInterface
{
    /**
     * Create model
     *
     * @param array $attributes
     * @return bool
     */
    public function create($attributes);

    /**
     * Update model
     *
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update($id, $attributes);

    /**
     * Read model
     *
     * @param int $id
     * @return mixed
     */
    public function read($id);

    /**
     * Delete model
     *
     * @param int $id
     * @return bool
     */
    public function delete($id);
}
