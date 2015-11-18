<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>文章列表</h1>
<hr>

@foreach($list as $key=>$value)
    <h2><a href="{{ url('/articles',$value['id']) }}">{{ $value['title'] }}</a><span>{{$value['published_at']}}</span></h2>
    <p>{{$value['content']}}</p>
@endforeach

{{--@foreach($list as $key=>$value)--}}
    {{--<h2><a href="{{ action('ArticlesController@show',[$value['id']]) }}">{{ $value['title'] }}</a></h2>--}}
    {{--<p>{{$value['content']}}</p>--}}
{{--@endforeach--}}


{{--@foreach($list as $key=>$value)--}}
    {{--<h2><a href="{{ route('zqq',[$value['id']]) }}">{{ $value['title'] }}</a></h2>--}}
    {{--<p>{{$value['content']}}</p>--}}
{{--@endforeach--}}
<hr>
<p style="color: red">有action,url,route三个辅助函数创建链接,url函数最容易,route函数最烦人</p>
<p style="color: red">route方法里面的第一个参数很特别,请参照routes.php里面关于as的设置</p>

</body>
</html>