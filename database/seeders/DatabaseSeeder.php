<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'title' => 'Завершить проект',
            'description' => 'Завершить все задачи и представить проект руководству.',
            'completed' => false,
        ]);

        Task::create([
            'title' => 'Подготовить презентацию',
            'description' => 'Подготовить презентацию для проекта.',
            'completed' => false,
        ]);

        Task::create([
            'title' => 'Провести совещание',
            'description' => 'Провести совещание для обсуждения последних изменений в проекте.',
            'completed' => true,
            'due_date' => '2024-02-27',
        ]);
    }
}
