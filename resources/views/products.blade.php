<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-3xl font-bold underline">Product Management</h1>
        <a href="{{route("products.create")}}">Add New Product</a>
        <h2 class="text-3xl font-bold underline">Product Olahan</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productOlahans as $product)
                <tr>
                    <td><img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id' => $product['id'], 'type' => 'olahan']) }}">Edit</a>
                        <form action="{{ route('products.destroy', ['id' => $product['id'], 'type' => 'olahan']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Product Non-Olahan</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Weight ( /kg)</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productNonOlahans as $product)
                <tr>
                    <td><img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}"></td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>{{ $product['stock'] }}</td>
                    <td>{{ $product['weight'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id' => $product['id'], 'type' => 'non_olahan']) }}">Edit</a>
                        <form action="{{ route('products.destroy', ['id' => $product['id'], 'type' => 'non_olahan']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
</body>
</html>
