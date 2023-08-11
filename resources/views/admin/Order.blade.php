@include('admin.navigation')
<br><br><br>

    <div class="container">
        <h2>Orders List</h2>
        <br><br>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group">
                    <select id="statusFilter" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                    </select>
                    <button id="filterBtn" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </div>

        <table id="ordersTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Delivery Driver</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr data-status="{{ $order->status }}">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                        <form action="{{ route('updateStatus', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" class="form-select">
                                <option value="pending" @if($order->status === 'pending') selected @endif>Pending</option>
                                <option value="processing" @if($order->status === 'processing') selected @endif>Processing</option>
                                <option value="shipped" @if($order->status === 'shipped') selected @endif>Shipped</option>
                                <option value="delivered" @if($order->status === 'delivered') selected @endif>Delivered</option>
                            </select>

                        </form>

                        </td>
                        <td>
                        <form action="{{ route('updateDriver', $order->id) }}" method="post">
                                @csrf
                                <select name="delivery_driver" onchange="this.form.submit()" class="form-select">
                                    <option value="">Not Assigned</option>
                                    @foreach($DeliveryOrder as $dr)
                                        @if($dr->order_id == $order->id)
                                            @foreach($deliveryDrivers as $driver)
                                                <option value="{{ $driver->id }}" @if($driver->id === $dr->delivery_driver_id) selected @endif>{{ $driver->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </form>

                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                            <!-- Add other action buttons as needed -->

                            <form action="{{ route('orders.destroy', $order->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Filter orders based on the selected status
            $("#filterBtn").on("click", function() {
                var statusFilter = $("#statusFilter").val();
                if (statusFilter) {
                    $("#ordersTable tbody tr").hide();
                    $("#ordersTable tbody tr[data-status='" + statusFilter + "']").show();
                } else {
                    $("#ordersTable tbody tr").show();
                }
            });
        });
    </script>

<br><br><br><br><br><br><br><br><br><br><br><br>
 @include('admin.down')

