@extends('admin.layouts.master')

@section('page_header')
    Добавление товара
@endsection

@section('content')
    @include('admin.parts.message')
    {{ Form::open(['route' => ['products.store'], 'files' => true]) }}

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Общее</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Характеристики</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Атрибуты</a></li>
            <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true">Изображения</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                @include('admin.product.parts.create.tab_1')
            </div>
            <div class="tab-pane" id="tab_2">
                @include('admin.product.parts.create.tab_2')
            </div>
            <div class="tab-pane" id="tab_3">
                @include('admin.product.parts.create.tab_3')
            </div>
            <div class="tab-pane" id="tab_4">
                @include('admin.product.parts.create.tab_4')
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>

    {{ Form::close() }}

@endsection