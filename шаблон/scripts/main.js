(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

$(document).ready(function() {
	var heightItem = {
		/*
		 * Получает высоту всех элементов переданного класса
		 * @param (string) element, элемент которые передает в функцию, ex. ".product__item"
		 * @return (string) Возращает наибольшее значение из массива
		 */
		get: function(element) {
			var arr = []; //Создаем массив

			// Перебираем все элементы и записываем в массив высоту
		    $(element).each(function() {
		        arr.push($(this).outerHeight());
		    });

		    arr = Math.max.apply(null, arr); // Ищем наибольшую высоту
		    return arr + 'px';  // Склеиваем число с px и возращаем как строку
		},
		
		/*
		 * Устанавливает высоту всем элементам указанного класса
		 * @param (string) element, элемент которые передает в функцию, ex. ".product__item"
		 */
		set: function(element) {
			var el = heightItem.get(element); // Получаем наибольшую высоту нашего элемента
			$(element).css('min-height', el); //Устанавливаем высоту по наибольшему значение
	    	return console.log('Установлена высота для: ' + element); 
		}
	};


	

	/* Отключение возможности перетаскивать изобращения*/
	$('img').attr("draggable", "false");

	/** Нормализация высот **/
	heightItem.set('.product__item');
	
	if ( $(window).width() > 991 ) {
		heightItem.set('.article__timeline');
	}
	
	/** Продукт: Табы для товара **/
	$( "#product__tabs" ).tabs({
		classes: {
			"ui-tabs-active": "product__tab_active"
		}
	});
	if($(window).width() > 991) {
		$('[href="#product__tabs-1"]').on('click', function(){
			$('.product__thumbmail_pager').removeAttr('style');
		})

		
		$('[href="#product__tabs-2"]').on('click', function(){
			$('.product__thumbmail_pager').css('width', '1170px');
		})
	}
	$('.nav__mobile_button').on('click', function(){
		$('.nav__mobile_list').toggle();
	});
	
	/*
	 * Кнопка показать или скрыть
	 */
	$('.btn__filter').on('click', function(){
		var el = $('.sidebar__additional').css('display');
		
		if(el == "block") {
			$(this).text('Показать фильтр');
			$(this).removeClass('btn__active');
			$('.sidebar__additional').toggle();
		}
		
		if(el == "none") {
			$(this).text('Скрыть фильтр');
			$(this).addClass('btn__active');
			$('.sidebar__additional').toggle();
		}
	});

	// Очистить фильтр
	$('.btn__filter_clear').on('click', function(e){
		e.preventDefault();
		$('input:checked').prop('checked', false);
	});

	

	$('.arrow__up').on('click', function(){
		var val = $('.product__count').val();
			val = parseInt(val) + 1;
		$('.product__count').val(val);
	});

	$('.arrow__down').on('click', function(){
		var val = $('.product__count').val();
			
			if(val <= 0) {
				return $('.product__count').val(0);
			}
			
			val = parseInt(val) - 1;
			$('.product__count').val(val);
	});

	$('.product__count').on('change', function(){
		var val = $('.product__count').val();
			if(val <= 0) {
				$('.product__count').val(0);
			}
	});
	/*
	 * Корзина удалить добавить	 
	 */
	
	 $('.arrow__left').on('click', function(e){
	 	e.preventDefault();
	 	cart.removeCount($(this).parent());

	 });
	 
	 $('.arrow__right').on('click', function(e){
		e.preventDefault();
		cart.addCount($(this).parent());

	 });

	var cart = {
		// Добавляем количество товаров
		addCount: function(element){
			var input = element.find('.table__cart_input'),
				val = parseInt(input.val());
			input.val(val + 1);

			this.updatePrice(input.val(), element);
			
		},
		
		// Удаляем
		removeCount: function(element){
			var input = element.find('.table__cart_input'),
				val = parseInt(input.val());
			
			input.val(val - 1);
			
			this.updatePrice(input.val(), element);
			this.checkCount(input.val(), element);
		},

		checkCount: function(input, element) {
			if (input < 1) {
				element.parent().css('display', 'none');
			}
		},

		updatePrice: function(multiplier, element) {
			var price = element.parent().find('.table__cart_price').html(), // Получаем значение из строки
				price = price.replace(/\s+/g, ''), // Удаляем пробелы из строки
				result = parseInt(price) * multiplier + "", // Переводим в число, умножаем и переводим в строку
				output = result.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '); // Делим число в строке на разряды

			element.parent().find('.table__cart_total').html(output); // Выводим в корзину
			this.updateTotal();
		},

		updateTotal: function(){
			var arr = [];
			
			for(var i=0; i<$('.table__cart_total').length; i++) {
				var total = $('.table__cart_total')[i];
				total = $(total).html();
				total = total.replace(/\s+/g, '');
				total = parseInt(total);
				arr.push(total);
			}
			
			var result = arr.reduce(function(sum, current) {
			  return sum + current;
			}, 0);

			$('.cart__sum_black').html(result + "руб.")
		}
	}

	/*
	 * Slider for price
	 */
	
		// Create range slider for price
		$('.js-price-rangeslider').bootstrapSlider({
			id: 'rangeslider',
			min: 0,
			max: 20000,
			range: true,
			value: [3000, 17000]
		});

		$('.js-age-rangeslider').bootstrapSlider({
			id: 'rangeslider2',
			min: 3,
			max: 18,
			range: true,
			value: [6, 15]
		});

		// Echo selected min and max price
		$('#rangeslider').on('slide', function(slideEvt) {
			$('.js__price_min').text(slideEvt.value[0]);
			$('.js__price_max').text(slideEvt.value[1]);
		});

		// Echo selected min and max price
		$('#rangeslider2').on('slide', function(slideEvt) {
			$('.js__age_min').text(slideEvt.value[0]);
			$('.js__age_max').text(slideEvt.value[1]);
		});
	
	/*****/

	/*
	 * Change view product
	 */

	 	$('.js-product-grid').on('click', function(){

	 		// Делаем нужную кнопку активной
	 		$('svg#fill-grid').css('fill', '#000');
	 		$('svg#fill-list').css('fill', '#7f7f7f');

	 		// Стили для сетки
	 		$('.product__item').attr('class', 'product__item product__layout_grid');

	 		// Скрываем не нужные данные
	 		$('.product__item_text, .product__item_spec').css('display', 'none');

	 		// Очищаем минимальную высоту и устанавливаем новую
	 		$('.product__item').removeAttr('style');
	 		heightItem.set('.product__item');

	 	});

	 	$('.js-product-list').on('click', function(){
	 		// Делаем нужную кнопку активной
	 		$('svg#fill-grid').css('fill', '#7f7f7f');
	 		$('svg#fill-list').css('fill', '#000');

	 		// Классы отображения списком
	 		$('.product__item').attr('class', 'product__item product__layout_list');
	 		$('.product__item_text, .product__item_spec').css('display', 'block');
	 		
			// Очищаем минимальную высоту и устанавливаем новую
	 		$('.product__item').removeAttr('style');
	 		heightItem.set('.product__item');
	 	});
	/*****/
	$(".js-modal").magnificPopup({
		type: "inline",
		midClick: false
	}),

	$('.product__related_slick').slick({
		slidesToShow: 4,
		infinite: true,
		appendArrows: '.product__related_toolbar',
		responsive: [
			{
		  	breakpoint: 991,
			  	settings: {
			  		slidesToShow: 3
			  	}
	  		},
	  		{
		  	breakpoint: 640,
			  	settings: {
			  		slidesToShow: 2
			  	}
			},
			{
				breakpoint: 440,
					settings: {
						slidesToShow: 1
					}
			}
			]
	});

	$('.product__thumbmail_common').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: true,
	  fade: true,
	  arrows: false,
	  asNavFor: '.product__thumbmail_pager'
	});
	
	$('.product__thumbmail_pager').slick({
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  asNavFor: '.product__thumbmail_common',
	  focusOnSelect: true,
	  responsive: [{
	  	breakpoint: 535,
	  	settings: {
	  		slidesToShow: 1
	  	}
	  }]
	});
});

},{}]},{},[1])

//# sourceMappingURL=main.js.map
