<?php

namespace App\DTO;

class TaskDTO
{
    public function __construct(
        private ?int $id,
        private string $title,
        private ?string $description,
        private bool $completed,
        private ?string $dueDate
    ) {}

    public static function fromArray(array $array): self
    {
        $id = $array['id'] ?? null;
        $title = $array['title'];
        $description = $array['description'] ?? null;
        $completed = $array['completed'];
        $dueDate = $array['due_date'] ?? null;

        return new self($id,$title,$description, $completed, $dueDate);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'due_date' => $this->dueDate
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getCompleted(): bool
    {
        return $this->completed;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
