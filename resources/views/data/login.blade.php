<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<section class="bg-indigo-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-indigo-400 ">
            DataFit
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h2 class="text-red-400">
                    {{ session()->get('error') ?? '' }}
                </h2>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('authenticate') }}">
                    @method('POST')
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-indigo-400">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 placeholder-indigo-300 focus:border-primary-600 block w-full p-2.5" placeholder="username" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-indigo-400">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-100 focus:border-indigo-100 placeholder-indigo-300 block w-full p-2.5" required="">
                    </div>
                    <div class="text-center">
                        <button class="rounded-md bg-indigo-50 py-2.5 px-6 w-full text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Login</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
