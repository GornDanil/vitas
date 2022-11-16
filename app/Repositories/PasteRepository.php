<?php

namespace App\Repositories;

use App\Models\Paste;
use Atwinta\Repository\Database\EloquentRepository;

/**
 * @extends EloquentRepository<Paste>
 */
class PasteRepository extends EloquentRepository implements Contracts\PasteRepository
{
    /**
     * {@inheritDoc}
     */
    protected function model(): string
    {
        return Paste::class;
    }
}
