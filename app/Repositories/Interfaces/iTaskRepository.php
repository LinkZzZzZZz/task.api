<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface iTaskRepository
{
    public function getById(int $id): Model;

    public function getToDelete(int $id): Model;

    public function get(?bool $completed, ?string $dieDate): LengthAwarePaginator;
}
