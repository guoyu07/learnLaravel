{{--可以输出所有错误--}}
{{--{{print_r($errors)}}--}}

{{--递归显示,增加错误可读性--}}
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif