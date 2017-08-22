@extends('admin.layouts.master')

@section('page_header')
    Редактирование категории: <b>{{ $category->name }}</b>
@endsection

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $category->name }}</h3>
        </div>
        {{ Form::model($category,['route' => ['categories.update',$category->id],'files' => true, 'method' => 'PUT']) }}
        <div class="box-body">
            @include('admin.parts.message')
            <div class="form-group">
                {{ Form::label('name','Имя категории [name]') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('alias','SEO url [alias]') }}
                {{ Form::text('alias',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('meta_title','Meta title') }}
                {{ Form::text('meta_title',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('meta_description','Meta description') }}
                {{ Form::textarea('meta_description',null,['class'=>'form-control','size' => '30x5']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description','Описание') }}
                {{ Form::textarea('description',null,['class'=>'form-control','size' => '30x5']) }}
            </div>
            <div class="form-group">
                {{ Form::label('published','Статус') }}
                {{ Form::select('published',[1=>'Показывать',0 => 'Скрыть'],null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('sort','Сортировка') }}
                {{ Form::number('sort',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group" style="width:300px;">
                <label for="">Миниатюра</label>
                <div class="image thumbnail" onclick="openKCFinder(this,0)">
                    @if(!empty($category->thumbnail))
                        <img class="p_img" src="{{ $category->thumbnail }}">
                    @else
                        <i class="fa fa-fw fa-hand-pointer-o"></i>
                    @endif
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
            max-width: 300px;
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
    <script>
        function openKCFinder(div,index) {
            window.KCFinder = {
                callBack: function(url) {
                    window.KCFinder = null;
                    div.innerHTML = '<div style="margin:5px">Загрузка...</div>';
                    var img = new Image();
                    img.src = url;
                    img.onload = function() {
                        div.innerHTML = '<img class="p_img" src="' + url + '" />';
                        $('#thumbnail').val(url);
                    }
                }
            };
            window.open('/kcfinder/browse.php?type=images&lang=ru&dir=images/public',
                    'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                    'directories=0, resizable=1, scrollbars=0, width=800, height=600'
            );
        }
    </script>
@endsection