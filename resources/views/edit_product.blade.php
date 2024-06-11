<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>

        <form action="{{ route('products.update', ['id' => $product['id'], 'type' => $type]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="type">Product Type:</label>
            <select name="type" id="type" disabled>
                <option value="olahan" {{ $type == 'olahan' ? 'selected' : '' }}>Olahan</option>
                <option value="non_olahan" {{ $type == 'non_olahan' ? 'selected' : '' }}>Non-Olahan</option>
            </select>
            
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
            <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" width="100">
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product['name'] }}" required>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ $product['price'] }}" required>
            
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ $product['category'] }}" required>
            
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ $product['description'] }}</textarea>

            <!-- Field khusus untuk produk non-olahan -->
            @if ($type == 'non_olahan')
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" value="{{ $product['stock'] }}" required>

            <label for="weight">Weight ( /kg):</label>
            <input type="number" step="0.01" name="weight" id="weight" value="{{ $product['weight'] }}" required>
            @endif
            
            <button type="submit">Update Product</button>
        </form>
    </div>
</body>
</html>
