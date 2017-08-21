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
            @component('admin.components.form_group',['id'=>'name', 'text'=>'Имя категории'])
            {{ Form::text('name',old('name'),['class'=>'form-control','id'=>'name']) }}
            @endcomponent

            @include('admin.components.text', ['name' => 'alias', 'text' => 'SEO url'])

            <div class="form-group">
                {{ Form::label('alias','SEO url [alias]',['class' => 'col-sm-2 control-label']) }}
                {{ Form::text('alias',old('alias'),['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('meta_title','Meta title') }}
                {{ Form::text('meta_title',old('meta_title'),['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('meta_description','Meta description') }}
                {{ Form::textarea('meta_description',old('meta_description'),['class'=>'form-control','size' => '30x5']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description','Описание') }}
                {{ Form::textarea('description',old('description'),['class'=>'form-control','size' => '30x5']) }}
            </div>
            <div class="form-group">
                {{ Form::label('published','Статус') }}
                {{ Form::select('published',[1=>'Показывать',0 => 'Скрыть'],old('published'),['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('sort','Сортировка') }}
                {{ Form::number('sort', 0 ,['class'=>'form-control']) }}
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