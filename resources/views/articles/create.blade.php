@extends('common/layout')

@section('title')
页面创建
@endsection

@section('main')
    <h1>文章发布</h1>
    <hr/>
    <?= Form::open(['action'=>'ArticlesController@store']) ?>
        @include('articles.form',['submitButtonText'=>'发布文章'])
    <?= Form::close() ?>
    @include('errors.list')
@endsection






