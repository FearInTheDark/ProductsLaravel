<x-layout>
    <x-slot:title>Categories</x-slot:title>
    <x-slot:heading>Categories Page</x-slot:heading>

    <div id="table" class="flex justify-center w-full mt-1 p-3">
        @if(count($categories) === 0)
            <p class="text-center text-gray-700">No categories found.</p>
        @else
            <table
                class="table-auto align-middle w-2/4 text-center shadow-md hover:translate-x-1 transform transition-all animated">
                <thead class="border-b-2 bg-gray-200">
                <tr>
                    <th class="p-3 text-sm font-semibold tracking-wide ">ID</th>
                    <th class="p-3 text-sm font-semibold tracking-wide ">Category Name</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($categories as $category)
                    <tr class="{{ $i % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="p-3 text-sm text-gray-700">
                            <a class="p-1.5 text-center hover:underline"
                               href="/category/{{ $category['id'] }}">
                                {{ $category['id'] }}
                            </a>
                        </td>
                        <td class="p-3 text-sm text-gray-700">
						<span class="p-1.5 text-center hover:underline">
							{{ $category['categoryName'] }}
						</span>
                        </td>
                        @php($i++)
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
    <div class="mt-4">
        {{ $categories->links('pagination::simple-tailwind') }}
    </div>
</x-layout>
