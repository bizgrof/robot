<div class="form-group">
    {{ Form::label('name','Имя товара [name]') }}
    {{ Form::text('name',old('name'),['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('sku','Артикул [articul]') }}
    {{ Form::text('sku',old('sku'),['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('alias','SEO url [alias]') }}
    {{ Form::text('alias',old('alias'),['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_title','Мета заголовок') }}
    {{ Form::text('meta_title',old('meta_title'),['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('meta_description','Мета описание') }}
    {{ Form::textarea('meta_description',old('meta_description'),['class'=>'form-control','size' => '30x5']) }}
</div>
<div class="form-group">
    {{ Form::label('description','Описание') }}
    {{ Form::textarea('description',old('description'),['class'=>'form-control','size' => '30x5']) }}
</div>