<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            margin-bottom: 20px;
           
    margin-right: 100px;
        }

        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, Helvetica, sans-serif;
        }

        input,
        select {
            margin-bottom: 10px;
            padding: 8px;
            width: calc(100% - 16px);
            box-sizing: border-box;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
            border: 2px solid #3490dc;
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
        .select-file{
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }
       
    </style>
</head>

<body>
<h1>Edit Upload</h1>
<form method="POST" action="{{ route('upload.update', $upload) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" placeholder="Name" value="{{ $upload->name }}">
    <select name="gender">
        <option value="male" {{ $upload->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $upload->gender == 'female' ? 'selected' : '' }}>Female</option>
    </select>

    @if ($upload->storage_type == 'do')
        <img id="imagePreview" src="{{ Storage::disk('do')->url($upload->file_path) }}" alt="{{ $upload->name }}" width="200">
    @elseif ($upload->storage_type == 'local')
        <img id="imagePreview" src="{{ asset('storage/myvolume/' . $upload->file_path) }}" alt="{{ $upload->name }}" width="200">
    @endif

    <input type="file" name="file" onchange="previewFile()">
    <button type="submit">Update</button>
</form>

    <script>
        function previewFile() {
            const preview = document.querySelector('#imagePreview');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                // convert image file to base64 string
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

