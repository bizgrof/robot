<div class="sidebar sidebar__catalog">
    <div class="sidebar__toolbar"><span class="toolbar__title">Фильтр</span></div>
    <div class="sidebar__block">
        <div class="sidebar__title">Цена</div>
        <div class="sidebar__slider">Цена:
            <span class="js__price_min">{{ $selected_filters['price'][0] or $prices->min_price }}</span> —
            <span class="js__price_max">{{ $selected_filters['price'][1] or $prices->max_price }}</span>
            <input id="price-range"
                   type="text"
                   data-slider-min="{{ $prices->min_price }}"
                   data-slider-max="{{ $prices->max_price }}"
                   data-slider-step="10"
                   <?php if(isset($selected_filters['price'])){?>
                   data-slider-value="[{{$selected_filters['price'][0]}},{{$selected_filters['price'][1]}}]"
                   <?php } else { ?>
                   data-slider-value="[{{ $prices->min_price }},{{ $prices->max_price }}]"
                   <?php } ?>
                   class="span2">
            <script> var price_range  = new Slider("#price-range");</script>
        </div>
    </div>
    <div class="sidebar__block">
        <div class="sidebar__title">Возраст</div>
        <div class="sidebar__slider">
            Выбрано: от <span class="js__age_min">{{ $ages->min_age }}</span>
            до <span class="js__age_max">{{ $ages->max_age }}</span>
            <input id="age-range"
                   type="text"
                   data-slider-min="{{ $ages->min_age }}"
                   data-slider-max="{{ $ages->max_age }}"
                   <?php if(isset($selected_filters['ages'])){ ?>
                   data-slider-value="[{{ $selected_filters['ages'][0] }},{{ $selected_filters['ages'][1] }}]"
                   <?php } else { ?>
                   data-slider-value="[{{ $ages->min_age }},{{ $ages->max_age }}]"
                    <?php } ?>
            >
            <script> var age_range  = new Slider("#age-range");</script>
        </div>
    </div>
    <a class="btn btn__filter">Показать фильтр</a>
    <div class="sidebar__additional">
        <ul class="sidebar__list" id="controls">
            <div class="sidebar__list_title">Тип управления</div>
            <li class="sidebar__item">
                <input type="checkbox" id="control_yes" class="sidebar__hidden" value="1"
                <?php if(isset($selected_filters['controls']) && in_array(1, $selected_filters['controls']) ){ echo 'checked';} ?>
                >
                <label for="control_yes" class="sidebar__item_label" >Управляемые</label>
            </li>
            <li class="sidebar__item">
                <input type="checkbox" id="control_no" class="sidebar__hidden" value="0"
                <?php if(isset($selected_filters['controls']) && in_array(0, $selected_filters['controls']) ){ echo 'checked';} ?>
                >
                <label for="control_no" class="sidebar__item_label">Неуправляемые</label>
            </li>
        </ul>
        <ul class="sidebar__list" id="manufacturers">
            <div class="sidebar__list_title">Производитель</div>
            @foreach($manufacturers as $manufacturer)
                <li class="sidebar__item">
                    <input type="checkbox" id="manufacturer{{ $manufacturer->id }}" class="sidebar__hidden" value="{{ $manufacturer->id }}"
                    <?php if(isset($selected_filters['manufacturers']) && in_array($manufacturer->id, $selected_filters['manufacturers']) ){ echo 'checked';} ?>
                    >
                    <label for="manufacturer{{ $manufacturer->id }}" class="sidebar__item_label">{{ $manufacturer->name }}</label>
                </li>
            @endforeach
        </ul>
        <ul class="sidebar__list" id="materials">
            <div class="sidebar__list_title">Материал</div>
            @foreach($materials as $material)
                <li class="sidebar__item">
                    <input type="checkbox" id="material_{{ $material->id }}" class="sidebar__hidden" value="{{ $material->id }}"
                    <?php if(isset($selected_filters['materials']) && in_array($material->id, $selected_filters['materials']) ){ echo 'checked';} ?>
                    >
                    <label for="material_{{ $material->id }}" class="sidebar__item_label">{{ $material->name }}</label>
                </li>
            @endforeach
        </ul>
        <ul class="sidebar__list" id="countries">
            <div class="sidebar__list_title">Страна производства</div>
            @foreach($countries as $country)
                <li class="sidebar__item">
                    <input type="checkbox" id="country_{{$country->id}}" class="sidebar__hidden" value="{{$country->id}}"
                    <?php if(isset($selected_filters['countries']) && in_array($country->id, $selected_filters['countries']) ){ echo 'checked';} ?>
                    >
                    <label for="country_{{$country->id}}" class="sidebar__item_label">{{$country->name}}</label>
                </li>
            @endforeach
        </ul>
        <a href="{{url()->current()}}" class="btn btn__filter_clear">Очистить фильтр</a>
    </div>
</div>

<script>
    var price_range;
$(function(){

    // Echo selected min and max age
    var t = false;
    $('#price-range').on('slide', function(slideEvt) {
        $('.js__price_min').text(slideEvt.value[0]);
        $('.js__price_max').text(slideEvt.value[1]);

        if(!t){
            t = true;
            setTimeout(function(){
                reload();
                t = false;
            },2500);
        }
    });

    // Echo selected min and max price
    var t2 = false;
    $('#age-range').on('slide', function(slideEvt) {
        $('.js__age_min').text(slideEvt.value[0]);
        $('.js__age_max').text(slideEvt.value[1]);

        if(!t2){
            t2 = true;
            setTimeout(function(){
                reload();
                t = false;
            },2500);
        };
    });

    // on change input[type="checkbox"]
    $('.sidebar__additional').find('input[type="checkbox"]').change(function(){
        reload();
    });
    //
    $('.content__sort_select').on('change',function(){
        reload();
    })

});

function reload(){
    var filters = {};
// price ==================================================================
    filters.price = price_range.getValue().join('.');
    filters.ages = age_range.getValue().join('.');

// controls ==================================================================
    var controls = [];
    var select_controls = $('#controls').find('.sidebar__hidden:checked');
    $.each(select_controls, function(){
        controls.push($(this).val());
    });
    if(controls.length != 0){
        filters.controls = controls.join('.');
    }
// manufacturers ==================================================================
    var manufacturers = [];
    var select_manufacturers = $('#manufacturers').find('.sidebar__hidden:checked');
    $.each(select_manufacturers, function(){
        manufacturers.push($(this).val());
    });
    if(manufacturers.length != 0){
        filters.manufacturers = manufacturers.join('.');
    }
// materials ==================================================================
    var materials = [];
    var select_materials = $('#materials').find('.sidebar__hidden:checked');
    $.each(select_materials, function(){
        materials.push($(this).val());
    });
    if(materials.length != 0){
        filters.materials = materials.join('.');
    }

// countries ==================================================================
    var countries = [];
    var select_countries = $('#countries').find('.sidebar__hidden:checked');
    $.each(select_countries, function(){
        countries.push($(this).val());
    });
    if(countries.length != 0){
        filters.countries = countries.join('.');
    }

// sort ==================================================================
    filters.sort = $('.content__sort_select').val();


    location.href = '?'+$.param(filters);



    console.log($.param(filters));
}

</script>