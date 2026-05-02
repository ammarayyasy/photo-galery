<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galery Foto Ammar dan Zahra</title>

    <!-- Justified Gallery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/justifiedGallery/dist/css/justifiedGallery.min.css" />

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    {{-- tailwind --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        body {
            font-family: sans-serif;
            background: #fafafa;
            padding: 2rem;
        }
        #gallery {
            margin: auto;
        }
        .jg-entry img {
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 px-4">

        <!-- HEADER -->
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Galeri Foto
            </h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">
                Ammar & Zahra
            </p>
        </div>

        <!-- FILTER CARD -->
        <div class="max-w-2xl mx-auto mb-10">
            <form method="GET" 
                class="bg-white/80 backdrop-blur-md border border-gray-200 p-6 md:p-8 rounded-3xl shadow-xl space-y-6">

                <!-- TITLE -->
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Filter Tanggal
                    </h3>
                    <p class="text-sm text-gray-400">
                        Pilih rentang waktu untuk melihat foto
                    </p>
                </div>

                <!-- INPUT -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Start -->
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">
                            Dari tanggal
                        </label>
                        <input 
                            type="date" 
                            name="start_date"
                            value="{{ request('start_date') }}"
                            class="w-full border border-gray-200 bg-white rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm"
                        >
                    </div>

                    <!-- End -->
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">
                            Sampai tanggal
                        </label>
                        <input 
                            type="date" 
                            name="end_date"
                            value="{{ request('end_date') }}"
                            class="w-full border border-gray-200 bg-white rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm"
                        >
                    </div>

                </div>

                <!-- ACTION -->
                <div class="flex items-center justify-between pt-2">

                    <button 
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-6 py-2.5 rounded-xl transition shadow-md hover:shadow-lg"
                    >
                        Terapkan Filter
                    </button>

                    <a 
                        href="{{ url()->current() }}"
                        class="text-sm text-gray-400 hover:text-red-500 transition"
                    >
                        Reset
                    </a>

                </div>

            </form>
        </div>

        <div id="gallery" class="mt-10">
            @if ($files->count())
                @foreach ($files as $file)
                    @if ($file->type === 'image')
                        <a data-fancybox="gallery" href="{{ asset('storage/' . $file->path) }}" data-caption="{{ $file->date?->translatedFormat('l, j F Y') }}{{ $file->description ? ' | ' . $file->description : '' }}">
                            <img src="{{ asset('storage/' . $file->path) }}" alt="Foto">
                        </a>
                    @elseif ($file->type === 'video')
                        <a data-fancybox="gallery" href="{{ asset('storage/' . $file->path) }}" data-caption="{{ $file->date?->translatedFormat('l, j F Y') }}{{ $file->description ? ' | ' . $file->description : '' }}">
                            <video muted playsinline>
                                <source src="{{ asset('storage/' . $file->path) }}" type="video/mp4">
                            </video>
                        </a>
                    @endif
                @endforeach
            @else
                <div class="text-center text-gray-400 py-20">
                    <p class="text-lg">Tidak ada foto atau video yang tersedia.</p>
                    <p class="text-sm mt-2">Coba atur ulang filter tanggal.</p>
                </div>
            @endif
        </div>

    </div>
    
    {{-- <div id="gallery">
        <a data-fancybox="gallery" href="https://picsum.photos/1280/720">
            <img src="https://picsum.photos/1280/720" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/1280/720">
            <img src="https://picsum.photos/1280/720" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/1280/720">
            <img src="https://picsum.photos/1280/720" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/720/1280">
            <img src="https://picsum.photos/720/1280" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/1280/720">
            <img src="https://picsum.photos/1280/720" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/720/1280">
            <img src="https://picsum.photos/720/1280" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/720/1280">
            <img src="https://picsum.photos/720/1280" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/1280/720">
            <img src="https://picsum.photos/1280/720" alt="Foto">
        </a>
        <a data-fancybox="gallery" href="https://picsum.photos/1280/720">
            <img src="https://picsum.photos/1280/720" alt="Foto">
        </a>
    </div> --}}

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/justifiedGallery/dist/js/jquery.justifiedGallery.min.js"></script>
    <script>
        $(function () {
            $('#gallery').justifiedGallery({
                rowHeight: 200,        // semua gambar distandarkan ke tinggi 200px
                margins: 5,
                lastRow: 'nojustify',
                captions: false
            });
        });
    </script>

    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            Thumbs: false,
            Toolbar: true,
        });
    </script>

</body>
</html>