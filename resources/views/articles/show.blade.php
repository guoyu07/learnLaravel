<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    标题:{{ $article->title }}
    <hr/>
    内容:{{ $article->content }}
    <hr/>

    {{--{{$article->tags->isEmpty()}}--}}

    @unless($article->tags->isEmpty())
        <h5>标签:</h5>
        <ul>
            @foreach($article->tags as $value)
                <li>{{$value->name}}</li>
            @endforeach
        </ul>
    @endunless
</body>
</html>