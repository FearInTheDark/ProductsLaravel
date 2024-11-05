<x-layout>
    <x-slot:title>Register</x-slot:title>
    <x-slot:heading>Register Page</x-slot:heading>
    <section class="px-4 pb-24 mx-auto max-w-7xl shadow-lg rounded-lg">
        <header class="flex items-center justify-center py-5 mb-5 border-b border-gray-200">
            <a href="/" title="Go to Kutty Home Page">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" width="40" alt="Laravel">
            </a>
        </header>
        <div class="w-full py-6 mx-auto md:w-3/5 lg:w-2/5 flex flex-col justify-center items-center">
            <h1 class="mb-1 text-xl font-medium text-center text-gray-800 md:text-3xl">Create your Free Account</h1>
            <p class="mb-2 text-sm font-normal text-center text-gray-700 md:text-base">
                Already have an account?
                <a href="/login" class="text-purple-700 hover:text-purple-900">Sign in</a>
            </p>
            <form class="mt-8 space-y-4 md:w-full w-3/4 flex flex-col items-center" method="POST" action="/register">
                @csrf
                <label class="block w-3/4 lg:w-full">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Name</span>
                    <input class="form-input rounded-lg w-full" name="name" type="text"
                           placeholder="Your full name"
                           value="{{ old('name') }}"
                           required/>
                </label>
                <label class="block w-3/4 lg:w-full">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                    <input class="form-input rounded-lg w-full" name="email" type="email" value="{{ old('email') }}"
                           placeholder="Ex. james@bond.com" inputmode="email" required/>
                </label>
                <label class="block w-3/4 lg:w-full">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Create a password</span>
                    <input class="form-input rounded-lg w-full" name="password" type="password"
                           placeholder="••••••••"  required/>
                </label>
                <label class="block w-3/4 lg:w-full">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Confirm password</span>
                    <input class="form-input rounded-lg w-full" name="password_confirmation" type="password"
                           placeholder="••••••••"
                           required/>
                </label>
                <input type="submit" class="w-full bg-purple-600 p-3 rounded-lg text-white font-semibold cursor-pointer"
                       value="Sign Up"/>
            </form>

            <p class="my-5 text-sm font-medium text-center text-gray-700">
                By clicking "Sign Up" you agree to our
                <a href="#" class="text-purple-700 hover:text-purple-900">Terms of Service</a>
                and
                <a href="#" class="text-purple-700 hover:text-purple-900">Privacy Policy</a>.
            </p>
        </div>
    </section>

</x-layout>
