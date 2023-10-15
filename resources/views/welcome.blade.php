<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="antialiased px-5">

<h2 class="text-xl">Ссылки этого тест задания</h2>

<p>
<ol style="list-style: decimal;">
    @foreach( $link as $k => $v )
        <li>
            <A class="" href="{{ $v }}" target="_blank">{{ $k }}</A><br/>
            <A class="text-blue-800 underline" href="{{ $v }}" target="_blank">{{ $v }}</A>
        </li>
    @endforeach
</ol>
{{--<A class="text-blue-800 underline" href="{{ $link }}" target="_blank">{{ $link }}</A>--}}
</p>
<br/>
<hr>
<br/>
<h2 class="text-xl">Файлик ридми ( задание + расклад что да как делал )</h2>

{!! $readme !!}

<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>

</body>
</html>
