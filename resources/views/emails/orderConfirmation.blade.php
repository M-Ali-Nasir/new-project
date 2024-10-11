<!DOCTYPE html>
<html>

<head>
  <title>Order Confirmation</title>
</head>

<body>
  <h1>Thank you for your order, {{ $order->user->name ?? 'Valued Customer' }}!</h1>
  <p>Your order has been successfully placed. Here are your order details:</p>

  <h3>Order Summary</h3>
  <p><strong>Order ID:</strong> {{ $order->id }}</p>
  <p><strong>Total Amount:</strong> {{ number_format($order->price, 2) }}</p>
  <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y, g:i a') }}</p>

  <h3>Items Ordered:</h3>
  <ul>
    @foreach ($order->orderDetails as $item)
    <li>

      id: {{ $item->id }} - Quantity: {{ $item->quantity }} - Price: {{ number_format($item->price, 2) }}

    </li>
    @endforeach
  </ul>

  <h3>Shipping Address:</h3>
  <p>{{ $order->billing_first_name }} {{ $order->billing_last_name }}</p>
  <p>{{ $order->billing_address }}</p>
  <p>{{ $order->billing_city }}, {{ $order->billing_state }}, {{ $order->billing_country }}</p>
  <p>{{ $order->billing_zip_code }}</p>

  <p>If you have any questions, feel free to contact us at <a
      href="mailto:support@yourstore.com">support@yourstore.com</a>.</p>
  <p>Thank you for shopping with us!</p>
</body>

</html>
