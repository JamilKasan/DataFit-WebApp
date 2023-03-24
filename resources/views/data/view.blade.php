<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div>
    <nav class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center font-sans text-indigo-600 text-3xl font-bold">
                        DataFit
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button onclick="location.href = '{{ route('logout') }}'" type="button" class="rounded-md bg-indigo-50 py-1.5 px-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Logout</button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button onclick="location.href = '{{ route('logout') }}'" type="button" class="rounded-md bg-indigo-50 py-1.5 px-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Logout</button>
{{--                    <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">--}}
{{--                        <span class="sr-only">Open main menu</span>--}}
{{--                        <!----}}
{{--                          Icon when menu is closed.--}}

{{--                          Menu open: "hidden", Menu closed: "block"--}}
{{--                        -->--}}
{{--                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />--}}
{{--                        </svg>--}}
{{--                        <!----}}
{{--                          Icon when menu is open.--}}

{{--                          Menu open: "block", Menu closed: "hidden"--}}
{{--                        -->--}}
{{--                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />--}}
{{--                        </svg>--}}
{{--                    </button>--}}
                </div>
            </div>
        </div>
    </nav>

</div>
<div>
    <div class="px-4 sm:px-6 lg:px-8 pt-4">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 text-xl text-indigo-600 bg-indigo-100 p-3 rounded text-center">Sessions</h1>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full align-middle">
                    <table class="min-w-full border-separate border-spacing-0">
                        <thead>
                        <tr>
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-indigo-500 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Date</th>
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-indigo-500 backdrop-blur backdrop-filter sm:table-cell">Time</th>
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-indigo-500 backdrop-blur backdrop-filter lg:table-cell">Distance</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($sessions as $session)
                                <tr>
                                    <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-medium text-indigo-400 sm:pl-6 lg:pl-8">{{date("d-m-Y H:i", strtotime($session->created_at))}}</td>
                                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-indigo-400 sm:table-cell">{{ $session->time }}</td>
                                    <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-indigo-400 lg:table-cell">{{ $session->distance }} M</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
