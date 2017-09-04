@extends('admin.layouts.master')

@push('header_scripts')
<script src="{{asset('assets/plugins/jquery-flexdatalist/jquery.flexdatalist.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-flexdatalist/jquery.flexdatalist.min.css')}}">
@endpush

@section('page_header')
    Товары
@endsection

@section('content')
    @include('admin.parts.message')

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-list" style="margin-right: 5px;"></i>Список товаров [{{ $count }}]</h3>
                <div class="box-tools">
                    <a href="{{ route('products.create') }}" class="btn btn-success glyphicon glyphicon-plus"></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover products-table">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Изображение</th>
                        <th>Название товара</th>
                        <th>Артикул</th>
                        <th>Категория</th>
                        <th>Статус</th>
                        <th style="width:108px"></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($products as $product)

                        <tr>
                            <td>{{(($products->currentPage()-1) * $products->perPage()) + $loop->iteration}}</td>
                            <td>
                                <label>
                                    <input type="checkbox" class="minimal" name="selected[]" value="{{$product->id}}">
                                </label>
                            </td>
                            <td>
                                <?php $img = $product->images->sortByDesc('sort')->first(); //dump($product->images) ?>
                                @if( $img )
                                <?php $img_src = str_replace('upload/product_images','upload/thumbs/product_images',$img->src); ?>
                                <img src="{{$img_src}}">
                                @else
                                    <span class="glyphicon glyphicon-picture" style="font-size: 45px;"></span>
                                @endif
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->sku}}</td>
                            <td>@if($product->category){{ $product->category->name }} @endif</td>
                            <td>
                                @if($product->published)
                                    <span class="glyphicon glyphicon-eye-open text-success"></span>
                                @else
                                    <span class="glyphicon glyphicon-eye-close text-danger"></span>
                                @endif
                            </td>

                            <td>
                                <div class="button-group pull-right">
                                    <a href="{{ route('products.destroy',['id' => $product->id]) }}" onclick="deleteItem(event,this)" class="btn btn-danger glyphicon glyphiconmy-trash"></a>
                                    <a href="{{ route('products.edit',['id' => $product->id]) }}"  class="btn btn-primary glyphicon glyphicon glyphicon-edit"></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $products->appends( Input::only(['category','articul','count','name','color','published']))->render() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <form action="" id="delete_form" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    </form>
    <style>
        table.products-table>tbody>tr>td{
            vertical-align: middle;
        }
        .glyphiconmy-trash:before {
            content: "\e020";
        }
    </style>
    <script>

        function deleteItem(event, link){
            event.preventDefault();
            $('#delete_form').attr('action', link.href).submit();

        }
    </script>
@endsection

