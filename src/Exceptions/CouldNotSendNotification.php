<?php

namespace NotificationChannels\:channel_namespace\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError($response)
    {
        return new static("Descriptive error message.");
    }

    public static function serviceUnknownResponse()
    {
        return new static('Unknown response coming from the Lifecell API.');
    }
}
