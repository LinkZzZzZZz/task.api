<?php

namespace App\DTO;

class FilterDTO
{
    public function __construct(
        private ?bool $completed,
        private ?string $dueDate
    ) {}

    public static function fromArray(array $array): self
    {
        $completed = $array['completed'] ?? null;
        $dueDate = $array['due_date'] ?? null;

        return new self($completed, $dueDate);
    }

    public function getCompleted(): ?bool
    {
        return $this->completed;
    }

    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }


}
