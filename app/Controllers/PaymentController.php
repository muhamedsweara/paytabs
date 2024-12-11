<?php

// app/Controllers/PaymentController.php
// app/Controllers/PaymentController.php
namespace App\Controllers;

use App\Models\OrderModel;
use CodeIgniter\Controller;
use Config\PayTabs;

class PaymentController extends Controller
{
    public function checkout($order_id)
    {
        // Get order details
        $orderModel = new OrderModel();
        $order = $orderModel->find($order_id);

        // Prepare the data to send to PayTabs API
        $data = [
            'profile_id' => (new PayTabs())->profile_id,
            'tran_type'  => 'sale',
            'tran_class' => 'ecom',
            'cart_detail' => json_encode([
                'item' => 'Order #' . $order['id'],
                'quantity' => 1,
                'price' => $order['total_amount'],
            ]),
            'currency'   => 'EGP',
            'amount'     => $order['total_amount'],
            'email'      => $order['user_email'],
            'phone'      => $order['user_phone'],
            // Add shipping and billing information if needed
            'billing_address' => $order['billing_address'],
            'shipping_address' => $order['shipping_address'],
        ];

        // Make the API call to PayTabs
        $response = $this->initiatePayment($data);

        // Handle PayTabs response
        if ($response['status'] == 'success') {
            return view('checkout', ['payment_url' => $response['payment_url']]);
        }

        return redirect()->to('/error');
    }

    private function initiatePayment($data)
    {
        $client = \Config\Services::curlrequest();
        $payTabsConfig
            =
            new

            PayTabs();
        // Prepare request URL
        $url = "https://api.paytabs.com/checkout/iframe/{$payTabsConfig->profile_id}";

        // Make API request to PayTabs
        $response = $client->request('POST', $url, [
            'form_params' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getAccessToken()
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    private function getAccessToken()
    {
        // Retrieve and return the access token for authentication
        return 'your_access_token';
    }
}
