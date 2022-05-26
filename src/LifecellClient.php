<?php

namespace Goszowski\Lifecell;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Goszowski\Lifecell\Exceptions\CouldNotSendNotification;
use Illuminate\Support\Facades\Http;

class LifecellClient
{
    protected string $endpoint;

    protected string $username;

    protected string $password;

    public function __construct()
    {
        $this->endpoint = config('services.lifecell.endpoint');
        $this->username = config('services.lifecell.username');
        $this->password = config('services.lifecell.password');

        return $this;
    }

    public function send($to, string $message)
    {
        $res = Http::withBasicAuth($this->username, $this->password)->post($this->endpoint, [
            'type' => 'sms',
            'to' => [
                ['msisdn' => $to]
            ],
            'body' => [
                'value' => $message,
            ],
        ]);

        if (!$res) {
            throw CouldNotSendNotification::serviceUnknownResponse();
        }

        return $res->json();
    }
}
