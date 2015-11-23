<?php
/**
 * Created by PhpStorm.
 * User: zqq
 * Date: 11/18/15
 * Time: 3:57 PM
 */
?>

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
    <?= Form::label('tag_list[]','文章标签') ?>
    <?=Form::select('tag_list[]',$tags,null,['multiple'=>'multiple','class'=>'form-control'])?>
</div>

<div class="form-group">
    <?=Form::button($submitButtonText,['type'=>'submit','class'=>"btn btn-primary btn-block"]) ?>
</div>

{{--
这种方式无法在编辑时获取已经勾选的值
Form::select('tags[]',$tags,null,['multiple'=>'multiple','class'=>'form-control'])
--}}


