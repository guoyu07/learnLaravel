@extends('common/layout') {{--继承模版--}}

@section('main') {{--main区块内容--}}
    {{--为避免显示数组时报错,用单引号将变量扩起来了--}}
    {{--尖括号不会对变量中的HTML字符进行转义--}}
    <h1>My name is <?= '$name' ?></h1>

    {{--花括号会对变量中的HTML字符进行转义--}}
    <h1>My name is {{ '$name' }}</h1>
    <h1>My name is {{ $firstName }} {{$lastName}}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab autem commodi dolorem est fugit, illo impedit iusto laudantium molestias nobis optio quia, ratione recusandae! Ab blanditiis dicta excepturi harum ullam!</p>

    @if('520'=='520'){{--展示了一下表达式的用法,还有很多,自己看咯--}}
        <?php echo "我爱余凤霞"; ?>
    @else
        echo "余凤霞爱我";
    @endif

@stop {{--结束标签,使用'@section'也是可以的--}}

@section('script')
    <script>alert('Hello World')</script> {{--脚本的使用--}}
@stop