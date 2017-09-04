<div class="content__toolbar">
    <div class="content__sort"><span class="toolbar__title">Сортировать по : </span>
        <select class="content__sort_select">
            <option value="default" <?php if(isset($selected_filters['sort']) and $selected_filters['sort'] == 'default'){ echo 'selected'; } ?> >Без сортировки</option>
            <option value="popular" <?php if(isset($selected_filters['sort']) and $selected_filters['sort'] == 'popular'){ echo 'selected'; } ?>>по популярности</option>
            <option value="price_desc" <?php if(isset($selected_filters['sort']) and $selected_filters['sort'] == 'price_desc'){ echo 'selected'; } ?>>цене по убыванию</option>
            <option value="price_asc" <?php if(isset($selected_filters['sort']) and $selected_filters['sort'] == 'price_asc'){ echo 'selected'; } ?>>цене по возрастанию</option>
            <option value="age_desc" <?php if(isset($selected_filters['sort']) and $selected_filters['sort'] == 'age_desc'){ echo 'selected'; } ?>>возраст по убыванию</option>
            <option value="age_asc"> <?php if(isset($selected_filters['sort']) and $selected_filters['sort'] == 'age_asc'){ echo 'selected'; } ?>возраст по возрастанию</option>
        </select>
    </div>
    <div class="content__switch_right">
        <div class="content__switch js-product-grid">


            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
            "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
            <svg version="1.1" id="fill-grid" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 318 318"
                 style="fill: #000" xml:space="preserve">
<g>
    <path d="M68,3H15C6.729,3,0,9.729,0,18v53c0,8.271,6.729,15,15,15h53c8.271,0,15-6.729,15-15V18C83,9.729,76.271,3,68,3z"/>
    <path d="M185,3h-53c-8.271,0-15,6.729-15,15v53c0,8.271,6.729,15,15,15h53c8.271,0,15-6.729,15-15V18C200,9.729,193.271,3,185,3z"
    />
    <path d="M303,3h-53c-8.271,0-15,6.729-15,15v53c0,8.271,6.729,15,15,15h53c8.271,0,15-6.729,15-15V18C318,9.729,311.271,3,303,3z"
    />
    <path d="M68,117H15c-8.271,0-15,6.729-15,15v53c0,8.271,6.729,15,15,15h53c8.271,0,15-6.729,15-15v-53
		C83,123.729,76.271,117,68,117z"/>
    <path d="M185,117h-53c-8.271,0-15,6.729-15,15v53c0,8.271,6.729,15,15,15h53c8.271,0,15-6.729,15-15v-53
		C200,123.729,193.271,117,185,117z"/>
    <path d="M303,117h-53c-8.271,0-15,6.729-15,15v53c0,8.271,6.729,15,15,15h53c8.271,0,15-6.729,15-15v-53
		C318,123.729,311.271,117,303,117z"/>
    <path d="M68,232H15c-8.271,0-15,6.729-15,15v53c0,8.272,6.729,15,15,15h53c8.271,0,15-6.728,15-15v-53
		C83,238.729,76.271,232,68,232z"/>
    <path d="M185,232h-53c-8.271,0-15,6.729-15,15v53c0,8.272,6.729,15,15,15h53c8.271,0,15-6.728,15-15v-53
		C200,238.729,193.271,232,185,232z"/>
    <path d="M303,232h-53c-8.271,0-15,6.729-15,15v53c0,8.272,6.729,15,15,15h53c8.271,0,15-6.728,15-15v-53
		C318,238.729,311.271,232,303,232z"/>
</g>
</svg>
        </div>
        <div class="content__switch js-product-list">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 231 231"
                 xmlns:xlink="http://www.w3.org/1999/xlink" id="fill-list" style="fill: #7f7f7f">
                <g>
                    <rect width="181" x="50" y="164.5" height="33"/>
                    <rect width="181" x="50" y="99.5" height="33"/>
                    <rect width="181" x="50" y="32.5" height="33"/>
                    <rect width="33" y="165.5" height="33"/>
                    <rect width="33" y="99.5" height="33"/>
                    <rect width="33" y="32.5" height="33"/>
                </g>
            </svg>

        </div>
    </div>
</div>