<?php

namespace App\Services;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService
{
    public function __construct(
        public TaskRepository $taskRepository
    ){}

    public function create(TaskDTO $dto): Task
    {
        return Task::create($dto->toArray());
    }

    public function update(TaskDTO $dto): Task
    {
        $task = $this->taskRepository->getById($dto->getId());

        $task->update($dto->toArray());

        return $task;
    }

    public function delete(int $id): void
    {
        $task = $this->taskRepository->getToDelete($id);

        $task->delete();
    }
}
