<?php

namespace App\Controller;

use App\DTO\TaskRequest\CreateTask;
use App\Manager\TaskManager;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class TaskController extends AbstractController
{
    public function __construct(private TaskManager $taskManager) {}

    #[
        Rest\Post("/api/task"),
        Rest\View(
            statusCode: 201,
            serializerGroups: ['taskCreate']
        ),
        ParamConverter("request", converter: "fos_rest.request_body"),
    ]
    public function createTask(CreateTask $request)
    {
        return $this->taskManager->createTask($request);
    }

    #[
        Rest\Put("/api/task/{taskId}"),
        Rest\View(
            statusCode: 200,
            serializerGroups: ['taskUpdate']
        ),
    ]
    public function updateTask(string $taskId, $request)
    {

    }

    #[
        Rest\Delete("/api/task/{taskId}"),
        Rest\View(
            statusCode: 204
        ),
    ]
    public function deleteTask(string $taskId): void
    {

    }

    #[
        Rest\Get("/api/task"),
        Rest\View(
            statusCode: 200,
            serializerGroups: ['taskGet']
        ),
    ]
    public function getTasks()
    {

    }

    #[
        Rest\Get("/api/task/{taskId}"),
        Rest\View(
            statusCode: 200,
            serializerGroups: ['taskGet']
        ),
    ]
    public function getTask(string $taskId)
    {

    }
}
