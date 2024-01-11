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
    <h1>New Upload</h1>
    <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <select name="gender" required>
            <option value="0">Male</option>
            <option value="1">Female</option>
        </select>
        
        <!-- Add storage choice dropdown -->
        <label for="storage_choice">Choose Storage:</label>
        <select name="storage_choice" id="storage_choice" required>
            <!-- <option value="local">Block Storage</option> -->
            <option value="do">DigitalOcean Spaces</option>
        </select>

        <input class="select-file" type="file" name="file" required onchange="loadFile(event)">
        <img id="output" width="200">
        <button type="submit">Upload</button>
    </form>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>

</html>
