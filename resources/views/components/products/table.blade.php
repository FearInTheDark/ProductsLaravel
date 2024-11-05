@props([
    'products' => []
])

<table {{ $attributes->merge([
    'class' => "table-auto align-middle w-full self-center shadow-md hover:translate-x-1 transform transition-all animated",
    ])}}
>
    <thead class="border-b-2 bg-gray-200">
    <tr class="">
        <th class="p-3 text-sm font-semibold tracking-wide text-left">ID</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Product Name</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Price</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Quantity</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Category</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Image</th>
    </tr>
    </thead>
    <tbody id="tbody">
    @php($i = 0)
    @foreach($products as $product)
        <tr class="{{ $i % 3 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-blue-50">
            <td class="p-3 text-sm text-gray-700">
                <a class="p-1.5 text-center hover:underline"
                   href="/products/{{ $product['id'] }}">
                    {{ $product['id'] }}
                </a>
            </td>
            <td class="p-3 text-sm text-gray-700">
                <a class="p-1.5 text-center hover:underline font-semibold"
                   href="{{ route('products.show', $product['id']) }}">
                    <span class="text-blue-600">({{ $product->comments_count }})</span>
                    <span>{{ $product['productName'] }}</span>
                </a>
            </td>
            <td class="p-3 text-sm text-gray-700 text-left">
        <span class="p-1.5 text-center hover:underline">
            {!! '<b>$' . $product['price'] . '</b>' !!}
        </span>
            </td>
            <td class="p-3 text-sm text-gray-700 text-center">
        <span class="p-1.5 text-center hover:underline">
            {{ $product['quantity'] }}
        </span>
            </td>
            <td class="p-3 text-sm text-gray-700">
        <span class="p-1.5 text-center hover:underline">
            {{ $product['category']['categoryName'] }}
        </span>
            </td>
            <td class="p-3 text-sm text-gray-700 overflow-auto text-nowrap">
                <a class="p-1.5 text-center hover:underline" href="{{ url('/products') }}">
                    {{ Str::limit($product['image'], 40, '...') }}
                </a>
            </td>
        </tr>

    @endforeach
    </tbody>
</table>

