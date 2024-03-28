<?php
// src/Controller/UsersController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

class UsersController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function createUser(Request $request): JsonResponse
    {
        // Extract data from request body
        $requestData = json_decode($request->getContent(), true);

        // Validate request data
        // You can use Symfony's validation component for this

        // Log user data
        $this->logger->info('New user created', $requestData);

        // Return success response
        return new JsonResponse(['message' => 'User created successfully'], JsonResponse::HTTP_CREATED);
    }
}
