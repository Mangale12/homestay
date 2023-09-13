<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->pdf_file }}</title>
</head>
<body>
    <iframe src="{{ asset('uploads/pdf/'.$post->pdf_file) }}#toolbar=0" frameborder="0" style="height: 100vh; width: 100vw;"></iframe>
</body>
</html>
