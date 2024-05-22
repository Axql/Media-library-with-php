<!-- resources/views/photos/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Photo Upload</title>
</head>

<body>
    <form action="/photos" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photos[]" multiple required>
        <input type="text" name="description" placeholder="Photo description">
        <button type="submit">Upload Photos</button>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </form>

    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    <div class="photos">
        @foreach($photos as $photo)
        <div class="photo">
            <img src="{{ asset('storage/' . $photo->filename) }}" alt="{{ $photo->description }}">
            <p>{{ $photo->description }}</p>
            <!-- Add a download button/link -->
            <a href="{{ asset('storage/' . $photo->filename) }}" download>
                <button>Download</button>
            </a>
        </div>
        @endforeach
    </div>
</body>

</html>