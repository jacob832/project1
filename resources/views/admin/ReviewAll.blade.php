@include('admin.navigation')
<br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <input type="text" id="productFilter" placeholder="Search by product name" onkeyup="filterProducts()">
        </div>
    </div>
    <div class="row" id="productList">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4 product-item">
                <div class="card">
                 
                            <img src="{{ asset('images/product/pdm.png') }}" class="card-img-top" alt="Default Image">
                    
     <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h>
                            <p class="card-text">Color: {{ $product->color_name }}</p>
                            <p class="card-text">Price: {{ $product->price }}</p>
                            <p class="card-text">Size: {{ $product->size }}</p>
                            <p class="card-text">Total Reviews: {{ $product->total_reviews }}</p>
                            <p class="card-text">Average Rating: {{ $product->average_rating ??0}}</p>
                            <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                    </div>
           
        @endforeach
    </div>
</div>

<br><br><br><br><br><br><br><br>
@include('admin.down')

<script>
    function filterProducts() {
        const input = document.getElementById('productFilter').value.toLowerCase();
        const productItems = document.getElementsByClassName('product-item');

        for (let i = 0; i < productItems.length; i++) {
            const productName = productItems[i].querySelector('.card-title').textContent.toLowerCase();
            if (productName.includes(input)) {
                productItems[i].style.display = "block";
            } else {
                productItems[i].style.display = "none";
            }
        }
    }
</script>