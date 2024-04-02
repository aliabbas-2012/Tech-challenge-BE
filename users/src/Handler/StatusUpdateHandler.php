<?php
declare(strict_types=1);

namespace App\Handler;

use App\Message\StatusUpdate;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class StatusUpdateHandler
{
    public function __construct() {}

    public function __invoke(StatusUpdate $statusUpdate): void
    {
        //mock function would be properly implemented in notifications
    }
}