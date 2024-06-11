<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
 <!-- Form untuk menambah produk -->
 <h2>Add New Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="type">Product Type:</label>
            <select name="type" id="type" required>
                <option value="olahan">Olahan</option>
                <option value="non_olahan">Non-Olahan</option>
            </select>
            
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" required>
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" required>
            
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" required>
            
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>

            <!-- Field khusus untuk produk non-olahan -->
            <div id="non_olahan_fields" style="display: none;">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock">

                <label for="weight">Weight( /kg):</label>
                <input type="number" step="0.01" name="weight" id="weight">
            </div>
            
            <button type="submit">Add Product</button>
        </form>
        <script>
        document.getElementById('type').addEventListener('change', function() {
            var nonOlahanFields = document.getElementById('non_olahan_fields');
            if (this.value === 'non_olahan') {
                nonOlahanFields.style.display = 'block';
            } else {
                nonOlahanFields.style.display = 'none';
            }
        });
    </script>
</body>
</html>