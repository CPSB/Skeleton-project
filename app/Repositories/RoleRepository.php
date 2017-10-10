<?php 

namespace ActivismeBE\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use ActivismeBE\Role;

/**
 * Class RoleRepository
 *
 * @package ActivismeBE\Repositories
 */
class RoleRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Find a specific role in the database.
     *
     * @param  integer $id The id from the role in the database.
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findRole($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Check if the role has the name 'admin'.
     *
     * @param  string $name The name from the role.
     * @return bool
     */
    public function isAdmin($name)
    {
        return $name === 'Admin';
    }
}