<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-bottom: 10px;
        }

        p{
            color: #3490dc;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #3490dc;
        }

        .upload-container {
            display: flex;
            flex-wrap: wrap;
        }

        .upload-item {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 10px;
            width: 300px;
        }

        .file-path {
            margin-top: 5px;
            color: #555;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        button {
            background-color: #3490dc;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... your head content ... -->
</head>
<body>
    <h1>Uploads</h1>
    <a href="{{ route('upload.create') }}">New Upload</a>
    <div class="upload-container">
        @foreach($uploads as $upload)
            <div class="upload-item">
                <p style="margin: 0; font-weight: bold;">Name: {{ $upload->name }}</p>
                <p style="margin: 0;">Gender: {{ $upload->gender == 0 ? 'Male' : 'Female' }}</p>
                <p style="margin: 0;">Storage: {{ $upload->storage_type == 'local' ? 'Block Storage' : ($upload->storage_type == 'do' ? 'Digital Space' : ucfirst($upload->storage_type)) }}</p>
                <p class="file-path">
                    @if ($upload->storage_type == 'local')
                        <img src="{{ asset('storage/myvolume/' . $upload->file_path) }}" alt="{{ $upload->file_path }}" width="200">
                    @elseif ($upload->storage_type == 'do')
                        <img src="{{ Storage::disk('do')->url($upload->file_path) }}" alt="{{ $upload->file_path }}" width="200">
                    @endif
                </p>
                <a href="{{ route('upload.show', $upload) }}">
                    <button>Show More</button>
                </a>
            </div>
        @endforeach
    </div>
</body>
</html>


</body>
</html>
