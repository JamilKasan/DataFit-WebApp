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
                        <div class="flex justify-between">
                            @php($user = \App\Models\Member::query()->where('id', session()->get('user'))->first())
                            <div class="rounded-md py-1.5 px-2.5 text-sm font-semibold text-indigo-600">{{ $user->firstname }} {{ $user->name }}</div>
                            <button onclick="location.href = '{{ route('logout') }}'" type="button" class="rounded-md bg-indigo-50 py-1.5 px-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Logout</button>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <div class="rounded-md py-1.5 px-2.5 text-sm font-semibold text-indigo-600">{{ $user->firstname }} {{ $user->name }}</div>
                    <button onclick="location.href = '{{ route('logout') }}'" type="button" class="rounded-md bg-indigo-50 py-1.5 px-2.5 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">Logout</button>
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
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-indigo-500 backdrop-blur backdrop-filter sm:table-cell">Duration</th>
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
