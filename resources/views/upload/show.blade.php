<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
        }

        p {
            margin: 5px 0;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }

        a, button {
            margin-top: 10px;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        a {
            background-color: #3490dc;
        }

        button {
            background-color: #e3342f;
        }
    </style>
</head>
<body>
    <h1>Name: {{ $upload->name }}</h1>
    <p>Gender: {{ $upload->gender == 0 ? 'Male' : 'Female' }}</p>
    <p>Storage Type: {{ $upload->storage_type == 'do' ? 'Digital Space' : 'Block Storage' }}</p>

    @if ($upload->storage_type == 'local')
        <img src="{{ asset('storage/myvolume/' . $upload->file_path) }}" alt="{{ $upload->name }}" width="500px">
    @elseif ($upload->storage_type == 'do')
        <img src="{{ Storage::disk('do')->url($upload->file_path) }}" alt="{{ $upload->name }}" width="500px">
    @endif

    <a href="{{ route('upload.edit', $upload) }}">Edit</a>
    <form method="POST" action="{{ route('upload.destroy', $upload) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</body>

</html>
