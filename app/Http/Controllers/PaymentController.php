<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{


    public function getPaymentHash(Request $request)
    {
        try {

            if (!$request->amount) {
                return response()->json(["status" => 403, "message" => "Purchase amount required!", "data" =>  []], 500);
            }

            if (!$request->firstname) {
                return response()->json(["status" => 403, "message" => "firstname required!", "data" =>  []], 500);
            }
            if (!$request->phone) {
                return response()->json(["status" => 403, "message" => "Phone number required!", "data" =>  []], 500);
            }
            if (!$request->email) {
                return response()->json(["status" => 403, "message" => "emailId required!", "data" => []], 500);
            }
            if (!$request->invoice) {
                return response()->json(["status" => 403, "message" => "invoice number required!", "data" => []], 500);
            }

            $key = '999tBr';
            $salt = 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC7HI7D2+l4X9OKQy6u47sPvTn7TU9OR6F4ehqnUbv4uHEAXfDlV1WY9lp6RcPmmZmk868S3NC2ZUWZJw/2Tf0PVkuOj65K2C2d1JgQIjqMijgwO/Gp/7UiGPW+hDjP898bP2Lox7fz9uHypQDoUYPsnq+Du3EpJ/XSYpCIKsytTnR1O6JQbE4yr1R/hejcsMsgUr8BNNkE+B9/d5d1qmBzNS3F3Qbg9+QtaBfq86Cnj24EfJDoNKhORhr+rLsZdZiloE39WrgMK0Ni5kJlKObElZBdjegU0oT9FuLSfD7Mf0OpFql3dzadTEilz6B33HG0N7dMFzif5mPq949BPCArAgMBAAECggEAeNNoHXHUwbafk5jufGDyWqeG2ZCCtbnruzCeJY3SJDp2PhZriK1syOnMY0jJyA9H+Ayj8TpGTIH4/30KAbM6xryi7dw6YHpYeqLdzw1LYZWf0wXieDR3cx1LE0uupBqG58F2zXqqfw/duCJ1A5Af8JxIGnjgCgOT6ddcHZIFuaLkULO3JF9Yac0nnLKvZiKnDYRqJdImzcbkS1co3gGJ5RhEbDuvOHMg4/R+QNrAvmi/f4ztS1IrwuM2Bn8gqoI0HVCpLPhVmjUpViM/ZHCsFRxaW6igtAoDXyqWebR7YK7RmfmKKTQUUTNsC0iJa6X1Z/vGOP24kOj1v2ucSNsbgQKBgQDttnplxQeJWmJxCO2PR+dWD8Gzxs5Yl3DTy4BXf6fYigWpGKdRrENCFmwbEDhZ91z4CxUbhcIBr6MHQDGJqJnHW1C2iGQAKMZ2TgdrCdSUVuReSiMqYuCpjbWNH0gYBeFPXWCi4FWrCHUsptysWEjDySux3snCEA6XGcNaLY8ZFQKBgQDJgYmJcNW88yxcGKZoVg6UbCdnTo3qBbDN9sajO4lOefcIw0bFDciDwLcP/FvVx6imUTYFD/00xK4nVT5FatcuHICGuigpHOqinuiVTUuC4iwFT+PwhzJ3NKSp+ZkRpSn9iLdCSnyi3/8ZSzBibzxfJX+xGOGJcYojGZeJQQYkPwKBgHe5oIwBYHpde5dS19OCc5F0/ip9xw/3tmv14v4u3WrCmXdBY4RPLtDqWiiHUtp9K+YCLu9dvwj6XTIZstmSgWFXLJ/CshsiblLHmhTfLqJH4V1cGboPcvfy163sQ3NWAtTmQvXF51/tMpb6s8pZ7MwvVkKP4y5KyA5ye2G/8ILBAoGBAIEGvPaQlYvDeagO8J7mW7eV+TUhC6XJtwhq944V1Tm2xwOJZotO5BHZGF7YDEW67rZwUdK0BkH/njP5VUJFwzr3bSTXllec+HDgp7TSJYPNJrrQCPg+2YWS480i0WyHAXgiTpXX9C6ml0Wu63BcIaAa9sSDVgcX+Ie5H1r3k+MpAoGABk4fWAmVWcvY9Rtc9FvObs3P/8vcE8UxIpL9uUAs1QaW911SWx+jmATpeAUuOSsDPIERVY5S3AAZtNotuMLQivn/FdZC6riBZNxQJ1GDJaCfIJjB6suucJnQIPEbHqdGb+wcEPKOFT86ewhoo3FrsWoksldZL6f7ef0n620hu1U=';
            $txnid = 'TXN' . uniqid();
            $amount = $request->amount;
            $productinfo = 'Payment';
            $firstname = $request->firstname;
            $phone = $request->phone;
            $email = $request->email;
            // $invoice = $request->invoice;

            $hash = generatePayUHash($key, $salt, $txnid, $amount, $productinfo, $firstname, $email);

            // $paymentLink = "https://test.payu.in/_payment?merchant_key={$key}&txnid={$txnid}&amount={$amount}&productinfo={$productinfo}&firstname={$firstname}&email={$email}&phone={$phone}&surl={$surl}&furl={$furl}&hash={$hash}";
            $url = "https://test.payu.in/_payment";

            $data = [
                'key' => $key,
                'txnid' => $txnid,
                'amount' => $amount,
                'firstname' => $firstname,
                'email' => $email,
                'phone' =>$phone,
                'productinfo' => $productinfo,
                'surl' => route('paymentSuccess'),
                'furl' => route('paymentFailure'),
                'hash' => strtolower($hash),
            ];


            Redirect::to($url)->with($data);
            // $response = Http::withHeaders([
            //     'Content-Type' => 'application/x-www-form-urlencoded',
            // ])->post($url, $data);


            // return response()->json(["status" => 200, "message" => "Success", "data" =>  $response], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => "Success", "data" =>  $e->getMessage()], 500);
        }
    }

    public function getPaymentSuccess(Request $request)
    {
        try {
            return response()->json(["status" => 200, "message" => "Success", "data" =>  $request], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => "Success", "data" =>  $e->getMessage()], 500);
        }
    }

    public function getPaymentFailed(Request $request)
    {
        try {

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $request], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => "Success", "data" =>  $e->getMessage()], 500);
        }
    }
}

function generatePayUHash($key, $salt, $txnid, $amount, $productinfo, $firstname, $email, $udf1 = '', $udf2 = '', $udf3 = '', $udf4 = '', $udf5 = '')
{
    // Concatenate the parameters to create a string
    $hashString = $key . '|' . checkNull($txnid) . '|' . checkNull($amount) . '|' . checkNull($productinfo) . '|' . checkNull($firstname) . '|' . checkNull($email) . '|' . checkNull($udf1) . '|' . checkNull($udf2) . '|' . checkNull($udf3) . '|' . checkNull($udf4) . '|' . checkNull($udf5) . '||||||' . $salt;

    // Hash the string using SHA-512
    $hash = hash('sha512', $hashString);

    return $hash;
}


function checkNull($value)
{
    return ($value != null) ? $value : '';
}
