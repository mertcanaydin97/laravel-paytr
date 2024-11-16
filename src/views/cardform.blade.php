
<script src="{{ asset('vendor/laravel-paytr/js/card.js') }}"></script>
<link rel="{{ asset('vendor/laravel-paytr/css/card.css') }}">
<div class="card-wrapper"></div>
<form action="{{ $data->posturl }}" method="post" id="paytrpayform">
    Kart Sahibi Adı: <input type="text" name="cc_owner" value="TEST KARTI"><br>
    Kart Numarası: <input type="text" name="card_number" id="number" value="9792030394440796"><br>
    Kart Son Kullanma Tarihi: <input type="text" name="expiry_month" id="expiryInput" value="12" ><br>
    Kart Güvenlik Kodu: <input type="text" name="cvv" id="cvcInput" value="000"><br>
    <input type="hidden" name="merchant_id" value="{{ $data->merchant_id }}">
    <input type="hidden" name="user_ip" value="{{ $data->user_ip }}">
    <input type="hidden" name="merchant_oid" value="{{ $data->merchant_oid }}">
    <input type="hidden" name="email" value="{{ $data->email }}">
    <input type="hidden" name="payment_type" value="{{ $data->payment_type }}">
    <input type="hidden" name="payment_amount" value="{{ $data->payment_amount }}">
    <input type="hidden" name="currency" value="{{ $data->currency }}">
    <input type="hidden" name="test_mode" value="{{ $data->test_mode }}">
    <input type="hidden" name="non_3d" value="{{ $data->non_3d }}">
    <input type="hidden" name="merchant_ok_url" value="{{ $data->merchant_ok_url }}">
    <input type="hidden" name="merchant_fail_url" value="{{ $data->merchant_fail_url }}">
    <input type="hidden" name="user_name" value="Paytr Test">
    <input type="hidden" name="user_address" value="test test test">
    <input type="hidden" name="user_phone" value="05555555555">
    <input type="hidden" name="user_basket" value="{{ $data->user_basket }}">
    <input type="hidden" name="debug_on" value="1">
    <input type="hidden" name="client_lang" value="{{ $data->client_lang }}">
    <input type="hidden" name="paytr_token" value="{{ $data->token }}">
    <input type="hidden" name="non3d_test_failed" value="{{ $data->non3d_test_failed }}">
    <input type="hidden" name="installment_count" value="{{ $data->installment_count }}">
    <input type="hidden" name="card_type" value="{{ $data->card_type }}">
    <input type="submit" value="Submit">
  </form>

 <script>
    var card = new Card({
    // a selector or DOM element for the form where users will
    // be entering their information
    form: '#paytrpayform', // *required*
    // a selector or DOM element for the container
    // where you want the card to appear
    container: '.card-wrapper', // *required*

    formSelectors: {
        numberInput: 'input#number', // optional — default input[name="number"]
        expiryInput: 'input#expiry', // optional — default input[name="expiry"]
        cvcInput: 'input#cvc', // optional — default input[name="cvc"]
        nameInput: 'input#name' // optional - defaults input[name="name"]
    },

    width: 200, // optional — default 350px
    formatting: true, // optional - default true

    // Strings for translation - optional
    messages: {
        validDate: 'valid\ndate', // optional - default 'valid\nthru'
        monthYear: 'aa/yy', // optional - default 'month/year'
    },

    // Default placeholders for rendered fields - optional
    placeholders: {
        number: '•••• •••• •••• ••••',
        name: 'Ad Soyad',
        expiry: '••/••',
        cvc: '•••'
    },

    masks: {
        cardNumber: '•' // optional - mask card number
    },

    // if true, will log helpful messages for setting up Card
    debug: false // optional - default false
});
</script>
