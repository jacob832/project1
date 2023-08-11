<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-primary,
        .btn-secondary {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            flex-grow: 1;
            margin: 0 5px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .form-control {
            width: 90%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1>Edit Variation</h1>
            <form action="{{ route('variations.update', $variation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $variation->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="color_id">Color</label>
                    <select name="color_id" id="color_id" class="form-control" required>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}" {{ $color->id == $variation->color_id ? 'selected' : '' }}>{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $variation->quantity }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $variation->price }}" required>
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <select name="size" id="size" class="form-control" required>
                        <option value="L" {{ $variation->size == 'L' ? 'selected' : '' }}>L</option>
                        <option value="XL" {{ $variation->size == 'XL' ? 'selected' : '' }}>XL</option>
                        <option value="XXL" {{ $variation->size == 'XXL' ? 'selected' : '' }}>XXL</option>
                        <option value="M" {{ $variation->size == 'M' ? 'selected' : '' }}>M</option>
                        <option value="S" {{ $variation->size == 'S' ? 'selected' : '' }}>S</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                       
                        <button type="submit" class="btn btn-primary">Update Variation</button>
                        <a href="{{ route('variations.create') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</html>