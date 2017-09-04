@extends('admin.layouts.master')

@section('page_header')
    Материал
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
                        <th>Название</th>
                        <th></th>
                    </tr>

                    <tr v-for="(material, index) in materials">
                        <td>@{{ index+1 }}</td>
                        <td>
                            <input type="text" class="form-control" v-model="material.name">
                            <input type="hidden" v-model="material.id">
                        </td>
                        <td>
                            <button v-on:click.prevent="deleteRow(index,material.id)" class="btn btn-danger glyphicon glyphicon-trash"></button>
                        </td>
                    </tr>

                    <tr>
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
                materials : {!! $materials !!}
            },
            methods : {
                addRow(){
                    this.materials.push({id : 0, name : ''});
                },
                deleteRow(index,id) {
                    $.ajax({
                        type : 'POST',
                        url : 'materials/' + id,
                        dataType: "json",
                        data : {_method : 'DELETE'},
                        success(data){
                            //console.log(data)
                        }
                    });
                    this.materials.splice(index,1)
                },
                save(){
                    var self = this;
                    $.ajax({
                        type : 'POST',
                        url : '{{ route('materials.store') }}',
                        dataType: "json",
                        data : {materials : this.materials},
                        success(data){
                            self.materials = data;
                        }
                    });
                }
            }

        });
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