@extends('admin.layouts.master')

@section('page_header')
    Создание категории
@endsection

@section('content')
    @include('admin.parts.message')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        {{ Form::open(['route' => ['categories.store']]) }}
        <div class="box-body">

            @include('admin.components.text', ['name' => 'name', 'text' => 'Имя категории','old' => old('name')])
            @include('admin.components.text', ['name' => 'alias', 'text' => 'SEO url','old' => old('alias')])
            @include('admin.components.text', ['name' => 'meta_title', 'text' => 'Meta title','old' => old('meta_title')])

            @include('admin.components.textarea', ['name' => 'meta_description', 'text' => 'Meta description', 'old' => old('meta_description')])
            @include('admin.components.textarea', ['name' => 'description', 'text' => 'Описание', 'old' => old('description')])


            <div class="form-group clearfix">
                {{ Form::label('published','Статус',['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-10">
                    {{ Form::select('published',[1=>'Показывать',0 => 'Скрыть'],old('published'),['class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group clearfix">
                {{ Form::label('sort','Сортировка',['class' => 'col-sm-2 control-label']) }}
                <div class="col-sm-10">
                    {{ Form::number('sort', 0 ,['class'=>'form-control']) }}
                </div>
            </div>


            <div class="form-group" style="width:300px;">
                <label for="">Миниатюра</label>
                <div class="image thumbnail" onclick="openKCFinder(this,0)">
                    <i class="fa fa-fw fa-hand-pointer-o"></i>
                </div>
                <input id="thumbnail" name="thumbnail" type="hidden" value="">
            </div>


        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        {{ Form::close() }}
    </div>
    <style type="text/css">
        .image {
            max-width: 100px;
            max-height: 150px;
            overflow: hidden;
            cursor: pointer;
            border-radius: 5px;
            color: #fff;
        }
        .image .fa-hand-pointer-o{
            font-size: 30px;
            color: #0499d1;
            line-height: 90px;
            width: 100%;
        }
        .table thead > tr > td, .table tbody > tr > td {
            vertical-align: middle;
        }
    </style>
    {{--<script>--}}
        {{--function openKCFinder(div,index) {--}}
            {{--window.KCFinder = {--}}
                {{--callBack: function(url) {--}}
                    {{--window.KCFinder = null;--}}
                    {{--div.innerHTML = '<div style="margin:5px">Загрузка...</div>';--}}
                    {{--var img = new Image();--}}
                    {{--img.src = url;--}}
                    {{--img.onload = function() {--}}
                        {{--div.innerHTML = '<img class="p_img" src="' + url + '" />';--}}
                        {{--$('#thumbnail').val(url);--}}
                    {{--}--}}
                {{--}--}}
            {{--};--}}
            {{--window.open('/kcfinder/browse.php?type=images&lang=ru&dir=images/public',--}}
                    {{--'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +--}}
                    {{--'directories=0, resizable=1, scrollbars=0, width=800, height=600'--}}
            {{--);--}}
        {{--}--}}
    {{--</script>--}}
@endsection