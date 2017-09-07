<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('price','Цена') }}
            {{ Form::number('price',$product->price,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('age','Возраст') }}
            {{ Form::number('age',$product->age,['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('control','Тип') }}
            {{ Form::select('control',[1=>'Управляймы',0 => 'Не управляймы'],$product->control,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('weight','Вес') }}
            {{ Form::number('weight',$product->weight,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('size','Размеры') }}
            {{ Form::text('size',$product->size,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('quantity','Количество') }}
            {{ Form::text('quantity',$product->quantity,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('models_count','Количество моделей') }}
            {{ Form::text('models_count',$product->models_count,['class'=>'form-control']) }}
        </div>

    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('video','Ссылка на видео') }}
            {{ Form::text('video',$product->video,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id','Категория') }}
            {{ Form::select('category_id',$categories, $product->category_id,['class'=>'form-control','placeholder' => 'Выберите категорию']) }}
        </div>

        <div class="form-group">
            {{ Form::label('manufacturer_id','Производитель') }}
            {{ Form::select('manufacturer_id',$manufacturers, $product->manufacturer_id,['class'=>'form-control','placeholder' => 'Выберите производителя']) }}
        </div>

        <div class="form-group">
            {{ Form::label('country_id','Страна производитель') }}
            {{ Form::select('country_id',$countries, $product->country_id,['class'=>'form-control','placeholder' => 'Выберите страну производителя']) }}
        </div>

        <div class="form-group">
            {{ Form::label('material_id','Материал') }}
            {{ Form::select('material_id',$materials, $product->material_id,['class'=>'form-control','placeholder' => 'Выберите материалы']) }}
        </div>
    </div>
</div>