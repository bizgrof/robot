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
        <tr id="image-row0">
            <td class="text-left">
                <div class="image thumbnail"  onclick="openKCFinder(this,0)">
                    <i class="fa fa-fw fa-hand-pointer-o"></i>
                </div>
            </td>
            <td class="text-right">
                <input type="text" name="product_image[0][sort]" value="0" placeholder="Порядок сортировки:" class="form-control">
            </td>
            <td class="text-left">
                <button type="button" onclick="$('#image-row0').remove();" data-toggle="tooltip" class="btn btn-danger" ><i class="fa fa-minus-circle"></i></button>
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td class="text-left"><button type="button" onclick="addImage();"  class="btn btn-primary" ><i class="fa fa-plus-circle"></i></button></td>
        </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript"><!--
    var image_row = 1;

    function addImage() {
        html  = '<tr id="image-row' + image_row + '">';
        html += '  <td class="text-left"><div class="image thumbnail" class="img" onclick="openKCFinder(this,'+image_row+')"><i class="fa fa-fw fa-hand-pointer-o"></i></div></td>';
        html += '  <td class="text-right"><input type="text" name="product_image[' + image_row + '][sort]" value="0" placeholder="Порядок сортировки:" class="form-control" /></td>';
        html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();"  class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
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
                }
            }
        };
        window.open('/kcfinder/browse.php?type=product_images&lang=ru&dir=images/public',
                'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
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

