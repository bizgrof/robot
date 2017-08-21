<div class="form-group clearfix">
    {{ Form::label($name, $text, ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text($name, old($name),['class'=>'form-control','id'=>$name]) }}
    </div>
</div>