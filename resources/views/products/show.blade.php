@php use Carbon\Carbon; @endphp
<x-layout>
    <x-slot:title>{{ $product['productName'] }}</x-slot:title>
    <x-slot:heading>{{ $product['productName'] }}</x-slot:heading>
    <div class="flex flex-row justify-between border rounded-lg shadow shadow-gray-50 p-4">
        <div class="my-4 mx-2">
            <p class=""><i class="fa-solid fa-minus"></i> Product's price: <strong>${{ $product['price'] }}</strong></p>
            <p class=""><i class="fa-solid fa-minus"></i>
                Product's quantity:
                <strong>{{ $product['quantity'] }}</strong>
            </p>
            <p class=""><i class="fa-solid fa-minus"></i>
                Category Name:
                <strong>{{ $product['category']->categoryName }}</strong>
            </p>
            <p class=""><i class="fa-solid fa-minus"></i>
                Image Link:
                <strong>{{ $product['image'] }}</strong>
            </p>
        </div>
        <div class="flex flex-col justify-center gap-2">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="relative w-fit self-center inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                <i class="fa-solid fa-pen-to-square text-blue-600"></i> Edit Product
            </button>
            <button
                class="relative w-fit self-center inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                onclick="deleteProduct({{ $product['id'] }})">
                <i class="fa-solid fa-trash text-red-500"></i> Delete Product
            </button>
            <x-div-form :product="$product" role="update"/>
        </div>
    </div>

    <div class="flex flex-col justify-between border rounded-lg shadow shadow-gray-50 p-4 mt-4">
        <div class="flex flex-row justify-between pr-3 w-full">
            <h3 class="text-2xl font-bold text-left px-5 p-2">{{ $product['comments_count'] }} Comments</h3>

            @guest
                <button
                    class="relative w-fit self-center inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                    onclick="openModal();">
                    <i class="fa-solid fa-right-to-bracket"></i> Login to Post a Comment
                </button>
            @endguest

            <div id="modal" class="hidden fixed top-0 left-0 w-full h-full z-50">
                <div class="grid place-items-center w-full h-full bg-gray-400/40">
                    <div class="w-96 h-fit bg-white rounded-lg shadow-lg p-8 gap-4">
                        <div class="flex w-full justify-center">
                            <img class="w-8 h-8 mr-2"
                                 src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg"
                                 alt="logo" width="40">
                            <h1 class="text-2xl font-bold text-center">Login</h1>
                        </div>
                        <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                                                                                        email</label>
                                <input type="email" name="email" id="email"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="name@company.com" required
                                       @error('email')
                                       style="border-color: red"
                                    @enderror
                                >
                                @error('email')
                                <span class="text-sm italic text-red-500 mx-2">{{ $message }}</span>
                                @enderror

                            </div>
                            <div>
                                <label for="password"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required="">
                                <input type="text" name="dynamic" value="true" hidden>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="remember" aria-describedby="remember" type="checkbox"
                                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        >
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember"
                                               class="text-gray-500 dark:text-gray-300">Remember me</label>
                                    </div>
                                </div>
                                <a href="#"
                                   class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">
                                    Forgot password?</a>
                            </div>
                            <button type="submit"
                                    class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Sign in
                            </button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet?
                                <a href="/register"
                                   class="font-medium text-primary-600 hover:underline dark:text-primary-500">Signup</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @auth
            {{--    Comment Form--}}
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="flex p-3 gap-4">
                    <img src="{{ asset('storage/images/avt' . rand(1, 5) . '.png') }}" alt="avatar"
                         class="h-12 w-12 flex-none rounded-full bg-gray-50">
                    <input type="text" value="{{ $product->id }}" name="product_id" hidden>
                    <input type="text" value="{{ true }}" name="fromForm" hidden>
                    <input type="text" name="content"
                           class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Write a comment..."
                           @error('content')
                           style="border-color: red"
                           value="{{ old('content') }}"
                        @enderror
                    >
                    <button class="text-blue-600 text-3xl">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        @endauth

        {{--    Comments List--}}
        <div class="relative flex flex-col p-3 gap-4">
            <ul role="list" class="divide-y divide-gray-100 columns-1 md:columns-2 gap-4" id="comments">
                @php($i = 0)
                @foreach ($comments as $comment)
                    <x-comment :comment="$comment" :i="$i++"/>
                @endforeach
            </ul>
        </div>

        <div class="mt-4">
            {{--            {{ $comments->links('pagination::simple-tailwind') }}--}}
        </div>

        @auth
            {{--    Comment Modal--}}
            <button data-modal-target="comment-modal" data-modal-toggle="comment-modal"
                    class="relative w-fit self-center inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                <i class="fa-solid fa-pen-to-square"></i> {{ __('Add Comment') }}
            </button>

            <!-- Main modal -->
            <div id="comment-modal" tabindex="-1" aria-hidden="true"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Post a Comment
                            </h3>
                            <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        {{--					 <form class="p-4 md:p-5" action="{{ route('comments.store') }}" method="POST">--}}
                        <div class="p-4 md:p-5 w-fit">

                            {{--						 @csrf--}}
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                           placeholder="Type product name" required=""
                                           value="{{ Auth::user()->name ?? '' }}">
                                </div>
                                <div class="col-span-2">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    {{-- Rating --}}
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500"
                                             aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    </div>

                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Comment Description
                                    </label>
{{--                                    <textarea id="content" rows="4" name="content"--}}
{{--                                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                                              placeholder="Write comment here"></textarea>--}}

                                    <div id="froala-editor" class="col-span-2">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="postBtn"
                                    class="text-white self-center inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    onclick="postComment({{ $product->id }})"
                            >
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                Add new Comment
                            </button>
                        </div>
                        {{--					 </form>--}}
                    </div>
                </div>
            </div>
        @endauth

    </div>

    <script type="text/javascript">
        const deleteProduct = async (id) => {
            try {
                const response = await fetch(`/products/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })

                if (response.ok) {
                    window.location.href = '/products'
                } else {
                    alert('An error occurred. Please try again.')
                }
            } catch (error) {
                console.error(error)
            }
        }

        const postComment = async (cmtId) => {
            try {
                const response = await fetch(`/comments`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: cmtId,
                        name: document.getElementById('name').value,
                        content: document.getElementById('paragraph').innerHTML
                    })
                })

                const data = await response.json()
                console.log(data)
                if (data.message) {
                    alert(data.message)
                    return
                }
                const comments = document.getElementById('comments')
                const commentItem = document.createElement('li')
                commentItem.classList.add('flex', 'flex-col', 'gap-x-6', 'p-5', 'col-span-2', 'md:col-span-1', 'border', 'rounded-lg', 'shadow-sm')
                commentItem.innerHTML = `
                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                             src=" {{ asset('storage/images/avt' . rand(1, 5) . '.png') }}"
                             alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">${data.comment.user.name}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                ${data.comment.user.email}</p>
                        </div>
                    </div>
                    <div class="sm:flex sm:flex-col mt-3 flex flex-col justify-between">
                        <p class="text-md text-left leading-6 text-gray-900 text-wrap box-border">${data.comment.content}</p>
                        <p class="mt-2 text-xs leading-5 text-gray-500 text-right">Last seen
                            <time datetime="2023-01-23T13:23Z">
                                ${data.comment.created_at}
                            </time>
                        </p>
                    </div>
                `
                comments.prepend(commentItem)
            } catch (error) {
                console.error(error)
            }

        }

        const openModal = () => {
            document.getElementById('modal').style.display = 'block';
        }

        const closeModal = () => {
            document.getElementById('modal').style.display = 'none';
        }

        document.addEventListener('click', (event) => {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
    <script>
        new FroalaEditor("div#froala-editor");
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const content = document.querySelector('.fr-view');
            const p = content.querySelector('p');
            p.id = 'paragraph'
            console.log(p)
        });
    </script>
</x-layout>
