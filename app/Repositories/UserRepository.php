<?php

namespace App\Repositories;
use App\Models\User;
use Atwinta\Repository\Database\EloquentRepository;

/**
 * @extends EloquentRepository<User>
 */

class UserRepository extends EloquentRepository implements Contracts\UserRepository
{
    /**
     * {@inheritDoc}
     */
    protected function model(): string
    {
        return User::class;
    }
}
