<?php

namespace Goszowski\Lifecell;

use Goszowski\Lifecell\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;

class LifecellChannel
{
    public function __construct()
    {
        // Initialisation code here
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \Goszowski\:channel_namespace\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $client = new LifecellClient();

        $message = $notification->toLifecell($notifiable, $notification);

        $response = $client->send($notifiable->routeNotificationFor('lifecell'), $message->body);

        if ($response->error) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
        }
    }
}
