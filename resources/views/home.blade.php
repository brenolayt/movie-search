@props(['movies'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body class="bg-gray-900 text-white min-h-screen">

    <!-- NAVBAR -->
    <nav class="flex items-center justify-between px-10 py-5 bg-gray-950 shadow-lg">
        <h1 class="text-3xl font-bold text-red-600 tracking-tight">MyFlix</h1>

        <form method="GET" action="{{ route('search') }}" class="flex gap-3">
            <input type="text" name="title"
                placeholder="Search movies..."
                class="px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-red-500 outline-none w-60">
            <button class="px-5 py-2 bg-red-600 hover:bg-red-700 rounded-lg transition">
                Search
            </button>
        </form>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="px-10 py-8">

        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-600/20 border border-red-500 text-red-400 rounded-lg text-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- SECTION TITLE -->
        <h2 class="text-3xl font-semibold mb-6 tracking-wide">Popular Movies</h2>

        <!-- MOVIE GRID -->
        @if(isset($movies['Search']) && is_array($movies['Search']))

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-10 justify-center">

                @foreach($movies['Search'] as $movie)
                <div class="group relative cursor-pointer">

                    <!-- Movie Poster (bigger & cleaner) -->
                    <div class="overflow-hidden rounded-xl shadow-xl">
                        <img
                            src="{{ $movie['Poster'] ?? 'https://via.placeholder.com/400x600?text=No+Image' }}"
                            alt="{{ $movie['Title'] }}"
                            class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-110">
                    </div>

                    <!-- Movie title -->
                    <h3 class="mt-3 text-lg font-semibold group-hover:text-red-400 transition">
                        {{ $movie['Title'] }}
                    </h3>

                    <p class="text-sm text-gray-400 mb-1">
                        {{ $movie['Year'] ?? '' }}
                    </p>

                    <!-- View details button -->
                    <a href="{{ route('view-more', $movie['imdbID']) }}"
                        class="inline-block mt-2 px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm transition">
                        View Details
                    </a>

                </div>
                @endforeach

            </div>

        @else
            <p class="text-gray-400 text-lg">No movies to display.</p>
        @endif

    </div>

</body>
</html>
