@extends('admin.layouts.master')

@section('page_header')
    Создание категории
@endsection

@section('content')
    @include('admin.parts.message')
    <div class="box box-primary" xmlns:v-on="http://www.w3.org/1999/xhtml" id="app">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <div class="box-body">

            <div class="box-body table-responsive no-padding" >
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Типы атрибутов</th>
                        <th></th>
                    </tr>

                    <tr v-for="(attribute_type, index) in attribute_types">
                        <td>@{{ index+1 }}</td>
                        <td>@{{ attribute_type.id }}</td>
                        <td>
                            <input type="text" class="form-control" v-model="attribute_type.name">
                            <input type="hidden" v-model="attribute_type.id">
                        </td>
                        <td>
                            <button v-on:click.prevent="deleteRow(index,attribute_type.id)" class="btn btn-danger glyphicon glyphicon-trash"></button>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><button v-on:click.prevent="addRow" class="btn btn-success glyphicon glyphicon-plus"></button></th>
                    </tr>
                    </tbody></table>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" v-on:click="save">Сохранить</button>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                attribute_types : {!! $attribute_types !!}
            },
            methods : {
                addRow(){
                    this.attribute_types.push({id : '', name : ''});
                },
                deleteRow(index,id) {
                    console.log(id);
                    if(!id){ return false; }
                    $.ajax({
                        type : 'POST',
                        url : 'attribute_types/' + id,
                        dataType: "json",
                        data : {_method : 'DELETE'},
                        success(data){
                            //console.log(data)
                        }
                    });
                    this.attribute_types.splice(index,1)
                },
                save(){
                    var self = this;
                    var data = this.attribute_types.filter(deleteEmpty);

                    $.ajax({
                        type : 'POST',
                        url : '{{ route('attribute_types.store') }}',
                        dataType: "json",
                        data : {attribute_types : data},
                        success(data){
                            self.attribute_types = data;
                        }
                    });
                }
            }

        });

        function deleteEmpty(item){
            return item.name.trim() !== '';
        }
    </script>



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
@endsection