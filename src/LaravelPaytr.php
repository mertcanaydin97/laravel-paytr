<?php

namespace Mertcanaydin97\LaravelPaytr;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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
    private function dataStd($data)
    {

        $std = new \stdClass();
        foreach ($data as $key => $value) {
            $std->{$key} = $value;
        }
        return $std;
    }
    public function paymentForm($carddata)
    {
        array_merge($carddata, $this->cardformdata);
        $data = $this->dataStd($carddata);
        return $data;
        return view('laravelpaytr::cardform', compact('data'));
    }
}
