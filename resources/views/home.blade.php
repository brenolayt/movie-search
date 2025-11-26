@props(['movies']);

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

    <!-- NAVBAR -->
    <nav class="flex items-center justify-between px-8 py-4 bg-gray-950 shadow-lg">
        <h1 class="text-3xl font-bold text-red-600">MyFlix</h1>

        <form method="GET" action="{{ route('search') }}" class="flex gap-2">
            @csrf
            <input type="text" name="title"
                placeholder="Search movies..."
                class="px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:border-red-500 outline-none">
            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded">Search</button>
        </form>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="px-8 py-6">

        <!-- SECTION TITLE -->
        <h2 class="text-2xl font-semibold mb-4">Popular Movies</h2>

        <!-- MOVIE GRID -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">

            @foreach($movies['Search'] as $movie)
            <div class="group relative cursor-pointer">

                <!-- Movie Poster -->
                <img
                    src="{{ $movie['Poster'] ?? 'https://via.placeholder.com/300x450?text=No+Image' }}"
                    alt="{{ $movie['Title'] }}"
                    class="rounded-lg w-full h-64 object-cover shadow-lg transition-transform duration-300 group-hover:scale-105">

                <!-- Hover Overlay -->
                <div class="opacity-0 group-hover:opacity-100 transition duration-300 absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-end p-3 rounded-lg">
                    <h3 class="text-lg font-bold">{{ $movie['Title'] }}</h3>

                    <p class="text-sm text-gray-300">
                        {{ $movie['Year'] ?? '' }}
                    </p>

                    <a href="{{ route('view-more', $movie['imdbID']) }}"
                        class="mt-2 px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                        View Details
                    </a>
                </div>

            </div>
            @endforeach

        </div>

    </div>

</body>

</html>