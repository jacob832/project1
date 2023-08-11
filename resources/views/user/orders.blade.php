@include('user.navigation')
<br><br><br>
<div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Products</h1>
                <!-- تنسيق البحث -->
                <div class="form-group">
                    <label for="productFilter">Filter Products:</label>
                    <input type="text" id="productFilter" class="form-control" oninput="filterProducts()">
                </div>
 <!-- تعديل الـ form -->
 <form action="/add_to_cart" method="post" id="purchaseForm">
                    @csrf <!-- ضمان أمان النموذج بإضافة الـ CSRF token -->
                <!-- قائمة المنتجات -->
                <ul class="list-group" id="productList">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <div class="form-check">
                                <!-- تعديل اسم الحقل ليكون variation_id -->
                                <input class="form-check-input" type="checkbox" id="product{{ $product->id }}" name="selectedVariations[]" value="{{ $product->variation_id }}">

                                <label class="form-check-label" for="product{{ $product->id }}">
                                    <!-- تحديث عنصر الصورة ليكون رابطًا -->
                                    <a href="#" onclick="openPopup('{{ asset($product->imageUrl ?: 'images/product/pdm.png') }}')">
                                        <img src="{{ asset($product->imageUrl ?: 'images/product/pdm.png') }}" alt="Product Image" class="img-fluid" style="maxWidth: 100px;">
                                    </a>
                                    <h3>{{ $product->name }}</h3>
                                    <p>Price: {{ $product->price }}</p>
                                    <p>Size: {{ $product->size }}</p>
                                    <p>Color: {{ $product->color_name  }}</p>
                                    
                                    
                                    <!-- إضافة حقل إدخال الكمية -->
                                    <label for="quantity{{ $product->id }}">Quantity:</label>
                                    <input type="number" id="quantity{{ $product->id }}" name="quantities[]" value="1" min="1">
                                </label>

                                <!-- إضافة حقل إدخال السعر -->
                                <input type="hidden" id="price{{ $product->id }}" name="prices[]" value="{{ $product->price }}">

                            </div>
                        </li>
                        <!-- إضافة فاصل بين كل منتج -->
                        <hr>
                    @endforeach
                </ul>

               
                <button type="submit" class="btn btn-success">Purchase</button>
                <button type="button" class="btn btn-danger" onclick="cancelSelection()">Cancel Selection</button>

                </form>
            </div>
        </div>
    </div>

<!-- إضافة الرابط إلى ملفات الجافا سكربت و jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function filterProducts() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('productFilter');
        filter = input.value.toUpperCase();
        ul = document.getElementById('productList');
        li = ul.getElementsByTagName('li');

        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName('h3')[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = '';
            } else {
                li[i].style.display = 'none';
            }
        }
    }

  
    function cancelSelection() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }

    function openPopup(imageUrl) {
        // عرض الصورة في نافذة منبثقة
        var popup = window.open(imageUrl, 'Product Image', 'width=500,height=500');
    }

    
    function confirmPurchase() {
        var selectedVariations = document.querySelectorAll('input[type="checkbox"]:checked');
        var quantities = document.querySelectorAll('input[type="number"]');
        var prices = document.querySelectorAll('input[name="prices[]"]');

        if (selectedVariations.length > 0) {
            var selectedVariationIds = [];
            var selectedQuantities = [];
            var selectedPrices = [];

            // Get the selected product ids, quantities, and prices
            for (var i = 0; i < selectedVariations.length; i++) {
                selectedVariationIds.push(selectedVariations[i].value);
                selectedQuantities.push(quantities[i].value);
                selectedPrices.push(prices[i].value);
            }

            // Some products are selected, confirm the purchase here
            alert('Purchase confirmed for selected variations: ' + selectedVariationIds.join(', ') + '\nQuantities: ' + selectedQuantities.join(', ') + '\nPrices: ' + selectedPrices.join(', '));

            // Send the form to the specified route after validating the data
            document.getElementById('purchaseForm').submit();
        } else {
            // No product selected, display an error message here
            alert('Please select at least one product.');
        }
    }



    


</script>



<br><br><br><br><br><br><br><br><br><br>
@include('user.down')