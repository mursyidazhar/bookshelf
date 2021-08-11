<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Bookshelf</title>
    
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>
<body>
    <x-navbar></x-navbar>

    @yield('content')

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
      AOS.init();
    </script>
@stack('prepend-script')
@stack('addon-script')
</body>
</html>