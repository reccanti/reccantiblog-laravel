<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
    <body>
        <ul>
            @foreach($posts as $post)
            <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    </body>
</html>
