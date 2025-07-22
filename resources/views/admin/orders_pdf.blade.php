<!DOCTYPE html>
<html>
<head>
    <title>All Orders PDF</title>
    <style>
        body { font-family: DejaVu Sans; }
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>All Orders</h2>

    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Size</th>
                <th>Qty</th>
                <th>Paid</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->product->size }}</td>
                <td>{{ $order->quantity }}</td>
                <td>${{ $order->payment_amount }}</td>
                <td>{{ $order->adminPayment->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
