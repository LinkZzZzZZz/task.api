<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\iTaskRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskRepository implements iTaskRepository
{
    public function __construct(
        protected Task $model
    )
    {}

    public function get(?bool $completed, ?string $dieDate): LengthAwarePaginator
    {
        $builder = $this->model->query();

        if (!is_null($completed)) {
            $builder->where('completed', $completed);
        }

        if (!is_null($dieDate)) {
            $startOfDay = Carbon::parse($dieDate)->startOfDay();
            $endOfDay = Carbon::parse($dieDate)->endOfDay();

            $builder->whereBetween('due_date', [$startOfDay, $endOfDay]);
        }

        return $builder
            ->paginate(100);
    }

    public function getById(?int $id): Task
    {
        return $this->model->find($id);
    }

    public function getToDelete(int $id): Task
    {
        return $this->model->select('id')->find($id);
    }

}
