<?php

namespace Guillermoandrae\Repositories;

use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Models\ModelInterface;

interface RepositoryInterface
{
    /**
     * Returns the model with the provided primary key.
     *
     * @param mixed $primaryKey  The primary key of the desired model.
     * @return ModelInterface|null
     */
    public function find(mixed $primaryKey): ?ModelInterface;

    /**
     * Returns a collection of models within the provided range.
     *
     * @param int $offset  The desired offset.
     * @param int|null $limit  The desired limit.
     * @return CollectionInterface|null
     */
    public function findAll(int $offset = 0, ?int $limit = null): ?CollectionInterface;

    /**
     * Returns a collection of models that meet the provided criteria within
     * the provided range.
     *
     * @param array $where  The selection criteria.
     * @param int $offset  The desired offset.
     * @param int|null $limit  The desired limit.
     * @return CollectionInterface|null
     */
    public function findWhere(array $where, int $offset = 0, ?int $limit = null): ?CollectionInterface;

    /**
     * Creates a model using the provided data and returns that model.
     *
     * @param array $data  The data to use when creating the model.
     * @return ModelInterface|null
     */
    public function create(array $data): ?ModelInterface;

    /**
     * Updates the model associated with the provided primary key using the
     * provided data. Returns the updated model.
     *
     * @param mixed $primaryKey  The primary key of the desired model.
     * @param array $data  The data to use when updating the model.
     * @return ModelInterface|null
     */
    public function update(mixed $primaryKey, array $data): ?ModelInterface;

    /**
     * Deletes the model associated with the provided primary key.
     *
     * @param mixed $primaryKey  The ID of the desired model.
     * @return bool
     */
    public function delete(mixed $primaryKey): bool;
}
