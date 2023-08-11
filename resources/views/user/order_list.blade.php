@include('user.navigation')
<br><br><br><br><br><br>
    <div class="container">
        <h1>Order List</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Number of Items</th>
                    <th>Total Amount</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->total_items}}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td><a href="{{ route('generatePDF', ['orderId' => $order->order_id ]) }}">View PDF</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


<br><br><br><br><br><br><br><br><br><br>
@include('user.down')