<form action="{{ $data->posturl }}" method="post">
    Kart Sahibi Adı: <input type="text" name="cc_owner" value="TEST KARTI"><br>
    Kart Numarası: <input type="text" name="card_number" value="9792030394440796"><br>
    Kart Son Kullanma Ay: <input type="text" name="expiry_month" value="12" ><br>
    Kart Son Kullanma Yıl: <input type="text" name="expiry_year" value="99"><br>
    Kart Güvenlik Kodu: <input type="text" name="cvv" value="000"><br>
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

