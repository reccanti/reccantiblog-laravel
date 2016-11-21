<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $post->title }}</title>
    <body>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->author }}</p>
        <p>first posted:{{ $post->created_at }} | updated:{{ $post->updated_at }}</p>
        {{ var_dump($post) }}
        <div>{!! Markdown::convertToHtml($post->content) !!}</div>
    </body>
</html>
