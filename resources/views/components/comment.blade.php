@php use Carbon\Carbon; @endphp
@props([
    'comment' => [],
    'i' => 0
])
<li class="flex flex-col gap-x-6 p-4 mb-4 border rounded-lg shadow-sm break-inside-avoid">
    <div class="flex min-w-0 gap-x-4 justify-between">
        <div class="flex gap-x-3 justify-between">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50 cursor-pointer"
                 src="{{ asset('storage/images/avt' . rand(1, 5) . '.png') }}"
                 alt="">
            <div class="min-w-0">
                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $comment->user->name }}</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                    {{ $comment->user->email }}</p>
            </div>
        </div>

        {{--Dropdown Menu--}}
        @auth
            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{$i}}"
                    data-dropdown-placement="bottom-start"
                    class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                    type="button">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 4 15">
                    <path
                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                </svg>
            </button>
            <div id="dropdownDots{{$i++}}"
                 class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                    <li>
                        <a href="#"
                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reply</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Forward</a>
                    </li>
                    <li>
                        <button class="block px-4 w-full text-left py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="navigator.clipboard.writeText('{{ $comment->content }}')">
                        Copy
                        </button>
                    </li>
                    <li>
                        <a href="#"
                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <button>Report</button>
                        </a>
                    </li>
{{--                    If comment->user == Auth::user--}}
                    @if($comment->user->id === Auth::user()->id)
                    <li>
                        <a href="#"
                           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                    </li>
                    @endif
                </ul>
            </div>
        @endauth
    </div>
    <div class="sm:flex sm:flex-col mt-3 flex flex-col justify-between" style="height: calc(100%);">
        <div class="flex">
            <p class="text-md text-left leading-6 text-gray-900 text-wrap box-border *:rounded-md">{!! $comment->content !!}</p>
        </div>
        <p class="mt-2 text-xs leading-5 text-gray-500 text-right">Last seen
            <time datetime="2023-01-23T13:23Z">
                @php
                    $createdAt = Carbon::parse($comment->created_at);
                    $now = Carbon::now();
                    $timeGap = $createdAt->diffForHumans($now);
                    echo $timeGap;
                @endphp
            </time>
        </p>
    </div>
</li>
