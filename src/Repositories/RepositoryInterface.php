<?php

namespace App\Repositories;

use App\Common\CollectionInterface;
use App\Models\ModelInterface;

interface RepositoryInterface
{
    /**
     * Returns the model with the provided ID.
     *
     * @param mixed $id  The ID of the desired model.
     * @return ModelInterface
     */
    public function findById($id): ModelInterface;

    /**
     * Returns a collection of models within the provided range.
     *
     * @param int $offset  The desired offset.
     * @param int|null $limit  The desired limit.
     * @return CollectionInterface
     */
    public function findAll(int $offset = 0, int $limit = null): CollectionInterface;

    /**
     * Returns a collection of models that meet the provided criteria within
     * the provided range.
     *
     * @param array $where  The selection criteria.
     * @param int $offset  The desired offset.
     * @param int|null $limit  The desired limit.
     * @return CollectionInterface
     */
    public function findWhere(array $where, int $offset = 0, int $limit = null): CollectionInterface;

    /**
     * Creates a model using the provided data and returns that model.
     *
     * @param array $data  The data to use when creating the model.
     * @return ModelInterface
     */
    public function create(array $data): ModelInterface;

    /**
     * Updates the model associated with the provided ID using the provided
     * data. Returns the updated model.
     *
     * @param mixed $id  The ID of the desired model.
     * @param array $data  The data to use when updating the model.
     * @return ModelInterface
     */
    public function update($id, array $data): ModelInterface;

    /**
     * Deletes the model associated with the provided ID.
     *
     * @param mixed $id  The ID of the desired model.
     * @return bool
     */
    public function delete($id): bool;
}
