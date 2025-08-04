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

    <h2>Galeri Foto Ammar dan Zahra</h2>

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

    <div id="gallery">
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
    </div>


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