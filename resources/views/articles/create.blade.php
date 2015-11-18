@extends('common/layout')

@section('title')
页面创建
@endsection

@section('main')
    <h1>文章发布</h1>
    <hr/>
    <?= Form::open(['url'=>'articles/store']) ?>
        <div class="form-group">
            <?= Form::label('title','文章标题') ?>
            <?= Form::input('text','title',null,['class'=>'form-control']) ?>
        </div>

        <div class="form-group">
            <?= Form::label('content','文章内容') ?>
            <?= Form::textarea('content', null,['class'=>'form-control']) ?>
        </div>

        <div class="form-group">
            <?= Form::input('date', 'published_at', date('Y-m-d'),['class'=>'form-control']) ?>
        </div>

        <div class="form-group">
            <?=Form::button('提交',['type'=>'submit','class'=>"btn btn-primary btn-block"]) ?>
        </div>

    <?= Form::close() ?>

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

@endsection






