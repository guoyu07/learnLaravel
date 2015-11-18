@extends('common/layout')

@section('title')
页面创建
@endsection

@section('main')
    <h1>编辑-{{$article->title}}</h1>
    <hr/>
    <?= Form::model($article,['method'=>'patch','action'=>['ArticlesController@update',$article->id]]) ?>
            @include('articles/form',['submitButtonText'=>'编辑发布'])
    <?= Form::close() ?>
    @include('errors.list')
@endsection
{{--编辑页面与发布页面的表单类似,有两处修改的地方--}}
{{--1.Form::open改为了Form::model--}}
{{--2.action提交的页面也进行了修改--}}
{{--至于为嘛编辑页面中Form提交到的Url与查看页面的URL一样,发挥的功能却不相同--}}
{{--主要还是@update的作用--}}





