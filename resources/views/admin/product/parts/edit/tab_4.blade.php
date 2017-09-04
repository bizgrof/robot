<div class="table-responsive">
    <table id="images" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <td class="text-left">Изображение товара:</td>
            <td class="text-right">Порядок сортировки:</td>
            <td></td>
        </tr>
        </thead>
        <tbody>

        <?php $loop_index = 0 ?>
        @foreach($product->images as $image)
            <tr id="image-row{{$loop->index}}">
                <td class="text-left">
                    <div class="image thumbnail" class="img" onclick="openKCFinder(this,{{$loop->index}})">
                        <img class="p_img" id="img{{$loop->index}}" src="{{$image->src}}">
                        <input type="hidden" name="product_image[{{$loop->index}}][src]" value="{{ $image->src }}" id="input-image{{$loop->index}}">
                    </div>
                    <input type="hidden" class="state" name="product_image[{{$loop->index}}][state]" value="old">
                    <input type="hidden" name="product_image[{{$loop->index}}][id]" value="{{ $image->id }}">
                    <input type="hidden" name="product_image[{{$loop->index}}][name]" value="{{ $image->name }}">
                </td>
                <td class="text-right">
                    <input type="text" name="product_image[{{$loop->index}}][sort]" value="{{ $image->sort }}" placeholder="Порядок сортировки:" class="form-control" onchange="setNewInput({{$loop->index}})">
                </td>
                <td class="text-left">
                    <button type="button" onclick="$('#image-row{{$loop->index}}').remove(); removeImage({{ $image->id }})" class="btn btn-danger" data-original-title="Удалить"><i class="fa fa-minus-circle"></i></button>
                </td>
            </tr>
            <?php $loop_index = $loop->index ?>
        @endforeach

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td class="text-left"><button type="button" onclick="addImage();" title="" class="btn btn-primary" data-original-title="Добавить изображение"><i class="fa fa-plus-circle"></i></button></td>
        </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript"><!--
    var image_row = {{ $loop_index+1 }};

    function addImage() {
        html  = '<tr id="image-row' + image_row + '">';
        html += '  <td class="text-left"><div class="image thumbnail" class="img" onclick="openKCFinder(this,'+image_row+')"><i class="fa fa-fw fa-hand-pointer-o"></i></div></td>';
        html += '  <td class="text-right"><input type="text" name="product_image[' + image_row + '][sort]" value="0" placeholder="Порядок сортировки:" class="form-control" /></td>';
        html += '  <td class="text-left"><input type="hidden" class="state" name="product_image[' + image_row + '][state]" value="new"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();"  title="Удалить" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#images tbody').append(html);

        image_row++;
    }


    function openKCFinder(div,index) {
        window.KCFinder = {
            callBack: function(url) {
                window.KCFinder = null;
                div.innerHTML = '<div style="margin:5px">Загрузка...</div>';
                var img = new Image();
                img.src = url;
                img.onload = function() {
                    div.innerHTML = '<img class="p_img" id="img'+index+'" src="' + url + '" /> <input type="hidden" name="product_image['+index+'][src]" value="'+url+'" id="input-image'+index+'">';
                    setNewInput(index); // задать статус тапа картинка изменена
                }
            }
        };
        window.open('/kcfinder/browse.php?type=product_images&lang=ru&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }


    function removeImage(image_id){
        $.ajax({
            type : "POST",
            url : '{{route('delete_image')}}',
            data : {id : image_id},
            success : function(data){
                console.log(data);
            }
        });
    }

    function setNewInput( index ){
        $('#image-row'+index).find(".state").val('new');
    }
    //--></script>

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

