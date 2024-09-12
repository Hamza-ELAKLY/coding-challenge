<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>

    <form method="GET" action="{{ route('products.index') }}">
        <label for="sort">Sort by Price:</label>
        <select id="sort" name="sort" onchange="this.form.submit()">
            <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
    </form>

    <ul>
        @foreach($products as $product)
            <li>
                {{ $product->name }} - ${{ $product->price }}
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
