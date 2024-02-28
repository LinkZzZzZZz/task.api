<?php

namespace App\Http\Controllers\Api\V1;

use App\DTO\FilterDTO;
use App\DTO\TaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaskDeleteRequest;
use App\Http\Requests\TaskIndexRequest;
use App\Http\Requests\TaskShowRequest;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Repositories\TaskRepository;
use App\Services\TaskService;


class TaskController extends Controller
{
    public function __construct(
        public TaskRepository $taskRepository,
        public TaskService $taskService
    ) {}

    public function index(TaskIndexRequest $request): TaskCollection
    {
        $dto = FilterDTO::fromArray($request->toArray());

        return new TaskCollection($this->taskRepository->get($dto->getCompleted(), $dto->getDueDate()));
    }

    public function show(TaskShowRequest $request): TaskResource
    {
        $task = $this->taskRepository->getById($request->id);

        return new TaskResource($task);
    }
    public function store(TaskStoreRequest $request): TaskResource
    {
        $dto = TaskDTO::fromArray($request->toArray());

        $task = $this->taskService->create($dto);

        return new TaskResource($task);
    }
    public function update(TaskUpdateRequest $request): TaskResource
    {
        $dto = TaskDTO::fromArray($request->toArray());

        $task = $this->taskService->update($dto);

        return new TaskResource($task);
    }

    public function destroy(TaskDeleteRequest $request): SuccessResource
    {
        $this->taskService->delete($request->id);

        return new SuccessResource(null);
    }
}
