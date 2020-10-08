<?php

namespace App\Feedback;

use Core\DataHolder;

class Feedback extends DataHolder
{
    protected array $properties = [
        'user_id',
        'feedback',
        'date',
    ];

    public function setUserId(?string $user_id)
    {
        $this->data['user_id'] = $user_id;
    }

    public function getUserIde()
    {
        return $this->data['user_id'] ?? null;
    }

    public function setFeedback(?string $feedback)
    {
        $this->data['feedback'] = $feedback;
    }

    public function getFeedback()
    {
        return $this->data['feedback'] ?? null;
    }

    public function setDate(?string $date)
    {
        $this->data['date'] = $date;
    }

    public function getDate()
    {
        return $this->data['date'] ?? null;
    }
}