<
    <!-- تضمين ملف قالب الملاحة -->
    @include('user.navigation')

    <br><br><br><br><br><br>

    <div class="container">
        <h2>Confirm Purchase and Enter Delivery Address</h2>
        <div class="cart-items">
            <form method="POST" action="{{ route('confirm_purchase') }}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Exclude</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>{{ $item['product_name'] }}</td>
                                <td>{{ $item['color_name'] }}</td>
                                <td>
                                    <input type="number" name="cartItems[{{ $item['id'] }}][quantity]" value="{{ $item['cart_item_quantity'] }}" min="0">
                                </td>
                                <td>{{ $item['price'] }}</td>
                                <td>{{ $item['price'] * $item['cart_item_quantity'] }}</td>
                                <td>
                                    <input type="hidden" name="cartItems[{{ $item['id'] }}][price]" value="{{ $item['price'] }}">
                                    <input type="checkbox" name="cartItems[{{ $item['id'] }}][exclude]" value="1">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="address-form">
                    <div class="form-group">
                        <label for="street_address">Street Address</label>
                        <input type="text" name="street_address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="area">Area</label>
                        <input type="text" name="area" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                </div>
            </form>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>
    <!-- تضمين ملف القائمة السفلية -->
    @include('user.down')

    <!-- جافا سكربت لإخفاء العناصر المحددة -->
    <script>
        // استهداف جميع عناصر الاختيار (checkboxes)
        const checkboxes = document.querySelectorAll('input[name^="cartItems["][type="checkbox"]');

        // الحصول على جميع الصفوف التي يجب إخفاؤها
        function getRowsToHide() {
            return document.querySelectorAll('input[name^="cartItems["][type="checkbox"]:checked');
        }

        // دالة لإخفاء الصفوف المحددة
        function hideSelectedRows() {
            const rowsToHide = getRowsToHide();
            rowsToHide.forEach(checkbox => {
                const row = checkbox.closest('tr');
                row.style.display = 'none';
            });
        }

        // تنفيذ دالة لإخفاء الصفوف عند تحميل الصفحة
        hideSelectedRows();

        // تعيين استجابة على تغيير حالة الاختيار
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                hideSelectedRows();
            });
        });
    </script>


<br><br><br><br><br><br><br><br>
@include('user.down')
