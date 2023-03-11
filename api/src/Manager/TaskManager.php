<?php

namespace App\Manager;

use App\Entity\Day;
use App\Entity\Task;
use App\Repository\DayRepository;
use App\Repository\TaskRepository;

class TaskManager
{
    public function __construct(
        private TaskRepository $taskRepository,
        private DayRepository $dayRepository
    ) {}

    public function createTask($request) {
        $day = $this->getDay($request->date);
        $task = new Task(
            $request->name,
            $request->status,
            $request->type,
            $day
        );
        $this->taskRepository->save($task, true);

        return $task;
    }

    private function getDay(string $date): Day {
        $day = $this->dayRepository->findBy(['date' => $date]);
        if (empty($day)) {
            $day = new Day( new \DateTimeInterface());
            $this->dayRepository->save($day, true);
        }

        return $day;
    }
}