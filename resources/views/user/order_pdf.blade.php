<!DOCTYPE html>
<html>
<head>
    <title>Order PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px auto;
            max-width: 800px;
        }

        .customer-details {
            margin-bottom: 20px;
        }

        .order-details {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="customer-details">
        <h1>Customer Details</h1>
        <p>Customer Name: {{ $customer->name }}</p>
        <p>Email: {{ $customer->email }}</p>
        <p>Phone Number: {{ $customer->phone_number }}</p>
        <p>Address: {{ $orders[0]->city . ', ' . $orders[0]->area . ', ' . $orders[0]->street_address }}</p>
        <!-- يمكنك إضافة المزيد من تفاصيل الزبون حسب الحاجة -->
    </div>

    <div class="order-details">
        <h1>Order Details</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Color</th>
                    <th>Size</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; $totalPrice = 0; $totalItems = 0; ?>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->color_name }}</td>
                        <td>{{ $order->size }}</td>
                    </tr>
                    <?php 
                        $totalPrice += $order->price * $order->quantity; 
                        $totalItems += $order->quantity;
                    ?>
                @endforeach
            </tbody>
        </table>

        <div>
            <p>Date :{{$orders[0]->date}}
            <p>Total Items: {{ $totalItems }}</p>
            <p>Total Price: {{ $totalPrice }}</p>
        </div>
    </div>
</div>
</body>
</html>
