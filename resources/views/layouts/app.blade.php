<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.10.15/dataRender/datetime.js"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta name="_token" content="{{ csrf_token() }}">
    
    <title>Yungo</title>
</head>
<body class="bg-gray-200">
    <div class="flex min-h-screen">
        @include('layouts.nav')
        <div class="flex flex-col w-full">
                @include('layouts.header')
                @yield('content')
                
        </div>
    </div>
    
    @yield('scripts')
</body>
</html>
