<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Psr\Log\LoggerInterface;
use App\Message\StatusUpdate;
class UsersController extends AbstractController
{
    private $logger;
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->messageBus = $messageBus;
    }

    public function createUser(Request $request): JsonResponse
    {
        // Extract data from request body
        $requestData = json_decode($request->getContent(), true);

        // Log user data if requestData is not null
        if ($requestData !== null) {
            $this->logger->info('New user created', $requestData);
            $status = "Worker X assigned to Y";
            $this->messageBus->dispatch(
                message: new StatusUpdate($status)
            );
        }

        // Return success response
        return new JsonResponse(['message' => 'User created successfully'], JsonResponse::HTTP_CREATED);
    }

}
