<div class="form-group clearfix">
    {{ Form::label($id, $text, ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ $slot }}
    </div>
</div>