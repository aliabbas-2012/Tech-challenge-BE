<?php

namespace App\Message;

class StatusUpdate
{
    public function __construct(protected string $status){}

    public function getStatus(): string
    {
        return $this->status;
    }
}