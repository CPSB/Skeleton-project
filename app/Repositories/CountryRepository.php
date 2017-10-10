<?php 

namespace ActivismeBE\Repositories;

use ActivismeBE\Countries;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class CountryRepository
 *
 * @package ActivismeBE\Repositories
 */
class CountryRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Countries::class;
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