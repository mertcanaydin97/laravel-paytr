<?php

namespace Mertcanaydin97\LaravelPaytr;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Mertcanaydin97\LaravelPaytr\Helpers\Payment;

class LaravelPaytr
{

    private $client;
    private $credentials;
    private $options;

    public function __construct(Client $client, array $credentials = [], array $options = [])
    {
        $this->client = $client;
        $this->credentials = $credentials;
        $this->options = $options;
    }


    public function payment()
    {
        return new Payment();
    }
    private function dataStd($data)
    {

        $std = new \stdClass();
        foreach ($data as $key => $value) {
            $std->{$key} = $value;
        }
        return $std;
    }
    public function paymentForm($payment)
    {
        return $payment;
        return view('laravelpaytr::cardform', compact('data'));
    }
}
