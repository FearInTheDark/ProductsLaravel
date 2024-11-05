<x-layout>
    <x-slot:title>Products</x-slot:title>
    <x-slot:heading>Products Page</x-slot:heading>
    <x-slot:headingButton>
        <div class="flex gap-x-4">
            <x-search-form/>
            <x-productForm/>
        </div>
    </x-slot>
    @if(empty($products))
        <div class="flex justify-center w-full mt-1 border p-3">
            <p class="text-center text-gray-700">No products found.</p>
        </div>
    @else
        <x-products.table :products="($products)"></x-products.table>
        <div class="mt-4">
            {{ $products->links('pagination::simple-tailwind') }}
        </div>
    @endif
</x-layout>
