@extends('admin.layouts.master')

@section('page_header')
    Производители
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

                    <tr v-for="(manufacturer, index) in manufacturers">
                        <td>@{{ index+1 }}</td>
                        <td>
                            <input type="text" class="form-control" v-model="manufacturer.name">
                            <input type="hidden" v-model="manufacturer.id">
                        </td>
                        <td>
                            <button v-on:click.prevent="deleteRow(index,manufacturer.id)" class="btn btn-danger glyphicon glyphicon-trash"></button>
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
                manufacturers : {!! $manufacturers !!}
            },
            methods : {
                addRow(){
                    this.manufacturers.push({id : 0, name : ''});
                },
                deleteRow(index,id) {
                    $.ajax({
                        type : 'POST',
                        url : 'manufacturers/' + id,
                        dataType: "json",
                        data : {_method : 'DELETE'},
                        success(data){
                            //console.log(data)
                        }
                    });
                    this.manufacturers.splice(index,1)
                },
                save(){
                    var self = this;
                    $.ajax({
                        type : 'POST',
                        url : '{{ route('manufacturers.store') }}',
                        dataType: "json",
                        data : {manufacturers : this.manufacturers},
                        success(data){
                            self.manufacturers = data;
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