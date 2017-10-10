<?php 

namespace ActivismeBE\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use ActivismeBE\User;

/**
 * Class UserRepository
 *
 * @package ActivismeBE\Repositories
 */
class UserRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Get the authenticated user from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function authencatedUser()
    {
        return $this->model->findOrFail(auth()->user()->id);
    }

    /**
     * Get an instance from the repository instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function baseModel()
    {
        return $this->model;
    }
}