<?php

return [

    'merchant_id' => ENV('PYATR_MERCHANT_ID', 'MAGAZA_NO'),
    'merchant_key' => ENV('PYATR_MERCHANT_KEY', 'XXXXXXXXXXX'),
    'merchant_salt' => ENV('PYATR_MERCHANT_SALT', 'YYYYYYYYYYY'),
    'merchant_ok_url' => ENV('PYATR_MERCHANT_OK_URL', 'http://site-ismi/basarili'),
    'merchant_fail_url' => ENV('PYATR_MERCHANT_FAIL_URL', 'http://site-ismi/basarisiz'),
    'debug' => ENV('PYATR_MERCHANT_DEBUG', 0),
    'test_mode' => ENV('PYATR_MERCHANT_TEST_MODE', 0),
    'non_3d' => ENV('PYATR_MERCHANT_NON_3D', 0),
    'post_url' => ENV('PYATR_MERCHANT_POST_URL', 0)
];
