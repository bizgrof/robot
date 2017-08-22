<div class="form-group clearfix">
    {{ Form::label($name, $text, ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::textarea($name, $old,['class'=>'form-control','size' => '30x5','id'=>$name]) }}
    </div>
</div>