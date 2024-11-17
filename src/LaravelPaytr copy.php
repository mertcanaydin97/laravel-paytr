<?php

namespace Mertcanaydin97\LaravelPaytr;

use Illuminate\Support\Facades\Http;

class LaravelPaytr
{

    private $card;
    private $posturl;
    private $merchant_id;
    private $merchant_key;
    private $merchant_salt;
    private $merchant_oid;
    private $token;


    private $merchant_ok_url;
    private $merchant_fail_url;

    private $user_details;
    private $config=[];

    private $cardformdata;
    public function __construct()
    {
        $this->merchant_id = config('laravel-paytr.merchant_id');
        $this->merchant_key = config('laravel-paytr.merchant_key');
        $this->merchant_salt = config('laravel-paytr.merchant_salt');

        $this->merchant_ok_url = config('laravel-paytr.merchant_ok_url');
        $this->merchant_fail_url = config('laravel-paytr.merchant_fail_url');

        $this->config["debug"] = config('laravel-paytr.debug');

        srand(time());
        $this->merchant_oid = rand();

        $this->config["test_mode"] = config('laravel-paytr.test_mode');

        $this->config["non_3d"] = config('laravel-paytr.non_3d');


        //Ödeme süreci dil seçeneği tr veya en
        $this->user_details["client_lang"] = "tr";

        //non3d işlemde, başarısız işlemi test etmek için 1 gönderilir (test_mode ve non_3d değerleri 1 ise dikkate alınır!)
        $non3d_test_failed = "0";

        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }

        $this->user_details["user_ip"] = $ip;

        $this->user_details["email"] = "testnon3d@paytr.com";

        // 100.99 TL ödeme
        $this->user_details["payment_amount"] = "100.99";
        $this->user_details["currency"] = "TL";
        //
        $this->user_details["payment_type"] = "card";

        //      $card_type = "bonus";       // Alabileceği değerler; advantage, axess, combo, bonus, cardfinans, maximum, paraf, world, saglamkart
        $this->user_details["card_type"] = null;
        $this->user_details["installment_count"] = "1";

        $this->posturl = config('laravel-paytr.post_url');

        $hash_str = $this->merchant_id . $this->user_details["user_ip"] . $this->merchant_oid . $this->user_details["email"] . $this->user_details["payment_amount"] . $this->user_details["payment_type"] . $this->user_details["installment_count"] . $this->user_details["currency"]. $this->config["test_mode"] . $this->config["non_3d"];
        $this->token = base64_encode(hash_hmac('sha256', $hash_str . $this->merchant_salt, $this->merchant_key, true));
        $formdata = [
            "posturl" => $this->posturl,
            "merchant_id" => $this->merchant_id,
            "user_ip" => $this->user_details["user_ip"],
            "merchant_oid" => $this->merchant_oid,
            "email" => $this->user_details["email"],
            "payment_type" => $this->user_details["payment_type"],
            "payment_amount" => $this->user_details["payment_amount"],
            "currency" => $this->user_details["currency"],
            "test_mode" => $this->config["test_mode"],
            "non_3d" => $this->config["non_3d"],
            "merchant_ok_url" => $this->merchant_ok_url,
            "merchant_fail_url" => $this->merchant_fail_url,
            "user_name" => $this->user_details["name"],
            "user_address" => $this->user_details["address"],
            "user_phone" => $this->user_details["phone"],
            "user_basket" => $this->user_details["basket"],
            "debug_on" => $this->config["debug"],
            "client_lang" => $this->user_details["client_lang"],
            "paytr_token" => $this->token,
            "non3d_test_failed" => $this->user_details["client_lang"],
            "installment_count" => $this->user_details["installment_count"],
            "card_type" => $this->user_details["card_type"],
        ];
        $this->cardformdata = $formdata;
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
