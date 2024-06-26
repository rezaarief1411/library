<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ strip_tags($title) }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <wireui:scripts />
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak] {
            display: none
        }
    </style>
    <livewire:styles/>
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-100 font-family-karla flex">
        <div class="relative w-full flex  flex-col h-screen overflow-y-hidden">
            <div class="w-full min-h-screen overflow-x-hidden border-t flex flex-col">
                <main class="w-full p-5 flex-grow">
                    <!-- Content goes here! 😁 -->
                    {{ $slot }}
                </main>
            </div>
        </div>

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <livewire:scripts/>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @vite('resources/js/app.js')
        @stack('scripts')
</body>

</html>
