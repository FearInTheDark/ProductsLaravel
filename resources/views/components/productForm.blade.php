@props([
    'product' => [],
    'divId' => 'crud-modal',
    'route' => route('products.store')
])

<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
>
    Create Product
</button>
<!-- Main modal -->
<x-div-form :product="$product"/>
@if($errors->any())
    <script>
        console.log(@json($errors->all()));
    </script>
@endif
