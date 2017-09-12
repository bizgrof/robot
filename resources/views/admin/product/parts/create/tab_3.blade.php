<div class="row" id="app">
    <div class="col-sm-6">
        <div class="box-body table-responsive no-padding" >
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>Атрибуты</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr v-for="(attribute, index) in attributes">
                    <td>
                        <select name="" id="" class="form-control" v-model="attribute.attribute_type_id" :name="'attributes['+index+'][attribute_type_id]'">
                            <option v-for="attribute_type in attribute_types"  :value="attribute_type.id">@{{ attribute_type.name }}</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" v-model="attribute.value" :name="'attributes['+index+'][value]'">
                    </td>
                    <td>
                        <button v-on:click.prevent="deleteRow(index)" class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                <!--<tr>
                    <th></th>
                    <th></th>
                    <th><button v-on:click.prevent="addRow" class="btn btn-success glyphicon glyphicon-plus"></button></th>
                </tr>-->
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix" style="background-color: #e4e4e4;">
            <div class="row">
                <div class="col-xs-5">
                    <select name="" id="" class="form-control" v-model="attribute_type_id"  v-on:change="errors.attr_type_select=false">
                        <option disabled value="default">Выберите атрибут</option>
                        <option v-for="attribute_type in attribute_types" :value="attribute_type.id">@{{ attribute_type.name }}</option>
                    </select>
                    <p v-show="errors.attr_type_select" class="text-red">Атрибут не выбран или не заполнено значение</p>

                </div>
                <div class="col-xs-5">
                    <input type="text" class="form-control" v-model="value" v-on:change="errors.attr_type_select=false">
                </div>
                <div class="col-xs-2">
                    <button type="button" class="btn btn-block btn-success" v-on:click.prevent="pushAttribute">Добавить</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            attribute_type_id : 'default',
            value : '',
            attributes : [],
            errors : {
                attr_type_select : false,
            },

            attribute_types : {!! $attribute_types !!}
        },
        methods : {
            pushAttribute(){
                if(this.attribute_type_id == 'default' || this.value == ''){
                    this.errors.attr_type_select = true;
                    return false;
                }
                this.attributes.push({
                    attribute_type_id : this.attribute_type_id,
                    value : this.value
                });
            },
            deleteRow(index,id) {
                this.attributes.splice(index,1)
                if(!id){ return false; }
                $.ajax({
                    type : 'POST',
                    url : 'attributes/' + id,
                    dataType: "json",
                    data : {_method : 'DELETE'},
                    success(data){
                        //console.log(data)
                    }
                });
            }
        }
    });

</script>