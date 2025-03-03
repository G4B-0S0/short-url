<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>URL Shortener</title>
</head>
<body>
    
    <main class="container mx-auto p-4 content-center">
        <div class="form grid grid-cols-3 gap-4 mb-10">
            <div></div>
            <div>
                <h1 class="text-4xl text-center mb-4">URL Shortener</h1>
                <x-form />
            </div>
            <div></div>
        </div>

    <div class="url-results">
        <h2 class="text-xl mb-4">URL's acortadas</h2>
    
    {{-- <div>
        <h2>Shortened URLs</h2>
        <ul>
            @foreach ($urls as $url)
                <li>
                    <a href="{{ $url->shortened }}">{{ $url->shortened }}</a>
                    <span>({{ $url->original }})</span>
                </li>
            @endforeach
        </ul>
    </div> --}}

    <x-tabla/>
    </div>
    </main>

</body>
</html>