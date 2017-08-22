@extends('admin.layouts.master')

@section('page_header')
    Категории
@endsection

@section('content')
    @include('admin.parts.message')

    <div class="col-xs-12" id="app">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-list" style="margin-right: 5px;"></i>Список категорий</h3>

                <div class="box-tools">
                    <a href="{{ route('categories.create') }}" class="btn btn-success glyphicon glyphicon-plus"></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Название категории</th>
                        <th>Статус</th>
                        <th>Сортировка</th>
                        <th></th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                @if($category->published)
                                    <span class="glyphicon glyphicon-eye-open text-success"></span>
                                @else
                                    <span class="glyphicon glyphicon-eye-close text-danger"></span>
                                @endif
                            </td>
                            <td>{{$category->sort}}</td>
                            <td>
                                @if($category->id != 0)
                                    <div class="button-group pull-right">
                                        <form action="{{ route('categories.destroy',['id' => $category->id]) }}" id="car-romove" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </form>
                                        <button form="car-romove" class="btn btn-danger glyphicon glyphicon-trash jquery-postback"></button>
                                        <a href="{{ route('categories.edit',['id' => $category->id]) }}" class="btn btn-primary glyphicon glyphicon glyphicon-edit"></a>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <style>
        .slide-transition {
            transition: all .3s cubic-bezier(.65, .05, .36, 1);
        }

        .slide-enter, .slide-leave {
            left: -100%;
        }
    </style>
@endsection