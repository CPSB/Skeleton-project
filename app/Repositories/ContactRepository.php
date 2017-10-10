<?php 

namespace ActivismeBE\Repositories;

use ActivismeBE\Contact;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class ContactRepository
 *
 * @package ActivismeBE\Repositories
 */
class ContactRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Contact::class;
    }

    /**
     * Find a specific message in the system or fail.
     *
     * @param  integer $id The id for the message in the database.
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findMessage($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get the base model instance and return it.
     * ----
     * Needed for the backend page in the contact section.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function baseModel()
    {
        return $this->model;
    }
}