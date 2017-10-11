<?php 

namespace ActivismeBE\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Illuminate\Notifications\DatabaseNotification;

/**
 * Class NotificationRepository
 *
 * @package ActivismeBE\Repositories
 */
class NotificationRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return DatabaseNotification::class;
    }

    /**
     * Find a specific notification in the database.
     *
     * @param  integer $notificationId The notification id in the database.
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function findNotification($notificationId)
    {
        return $this->model->findOrFail($notificationId);
    }
}