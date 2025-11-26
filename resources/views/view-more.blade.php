@props(['movie'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie['Title'] ?? 'Movie Details' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100">

    <!-- NAVBAR -->
    <nav class="border-b border-gray-700 px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Movie Explorer</h1>

        <a href="{{ route('home') }}"
           class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white">
            ← Back
        </a>
    </nav>

    <!-- CONTENT -->
    <div class="max-w-5xl mx-auto py-12 px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- POSTER -->
            <div class="flex justify-center">
                <img 
                    src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/400x600?text=No+Image' }}"
                    alt="Poster"
                    class="rounded-lg shadow-2xl w-full max-w-sm"
                >
            </div>

            <!-- MOVIE DETAILS -->
            <div class="md:col-span-2 space-y-6">

                <h2 class="text-4xl font-bold">
                    {{ $movie['Title'] ?? 'Unknown Title' }}
                </h2>

                <p class="text-gray-400 text-lg">
                    {{ $movie['Year'] ?? '' }} • {{ $movie['Rated'] ?? '' }} • {{ $movie['Runtime'] ?? '' }}
                </p>

                <!-- GENRES -->
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $movie['Genre'] ?? '') as $genre)
                        <span class="px-3 py-1 bg-gray-800 rounded-full text-sm">
                            {{ trim($genre) }}
                        </span>
                    @endforeach
                </div>

                <!-- PLOT -->
                <p class="text-gray-300 leading-relaxed">
                    {{ $movie['Plot'] ?? 'No plot available.' }}
                </p>

                <!-- EXTRA INFO GRID -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">

                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-sm text-gray-400">Director</p>
                        <p class="font-semibold">{{ $movie['Director'] ?? 'N/A' }}</p>
                    </div>

                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-sm text-gray-400">Writer</p>
                        <p class="font-semibold">{{ $movie['Writer'] ?? 'N/A' }}</p>
                    </div>

                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-sm text-gray-400">Actors</p>
                        <p class="font-semibold">{{ $movie['Actors'] ?? 'N/A' }}</p>
                    </div>

                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-sm text-gray-400">Country</p>
                        <p class="font-semibold">{{ $movie['Country'] ?? 'N/A' }}</p>
                    </div>

                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-sm text-gray-400">Awards</p>
                        <p class="font-semibold">{{ $movie['Awards'] ?? 'N/A' }}</p>
                    </div>

                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-sm text-gray-400">IMDB Rating</p>
                        <p class="font-semibold">{{ $movie['imdbRating'] ?? 'N/A' }}</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
