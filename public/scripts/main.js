"use strict";
function updateCount(product_id, input){
	Cart.updateProductQty(product_id, $(input).val());
}

function addToCart(product_id){
	var count = $(".product__count").val();
	Cart.add(product_id, count);
	$(".product__count").val(1);
}

function checkout(){
	var order_type = $('input[name="order_type"]:checked').val();
	if(!order_type){ alert('Выберите способ доставки'); }

	console.log(order_type);
}

//==================================== Cart increment/decrement ========================================

function decCart(product_id){
	var product_count = $("#cart_product_"+product_id+" .table__cart_input");
	var val = 0;
	if(product_count.val() != 0){
		val = parseInt(product_count.val()) - 1;
	}
	Cart.updateProductQty(product_id,val);
	product_count.val(val);
}

function incCart(product_id){
	var product_count = $("#cart_product_"+product_id+" .table__cart_input");
	product_count.val(parseInt(product_count.val()) + 1);
	Cart.updateProductQty(product_id,product_count.val());
}

//==================================== Cart ========================================

var Cart = {

	add : function(product_id, qty){
		var data = {
			product_id : product_id,
			qty : qty
		}
		this.send('/cart/add', data, 'POST');
	},

	clear : function(){
		this.send('/cart/clear', '', 'GET');
	},

	updateProductQty : function (product_id, qty){
		var data = {
			product_id : product_id,
			qty : qty
		}
		this.send('/cart/update_product_qty', data, 'POST');
	},

	getCart : function(){
		var json;
		$.getJSON('cart/get_cart', function(data){
			//console.log(data);
			json = data;
		});
		console.log(json);
		return json;
	},

	send : function(url, data, type){
		$.ajax({
			url : url,
			dataType : 'json',
			type : type,
			data : data,
			success : function(data){
				for(var product in data.products){
					$("#cart_product_" + product + " .table__cart_total").text(data.products[product].cost);
					console.log(data.products[product].cost);
				}
				$("#cart_qty, .cart_total_qty").text(data.total_qty);
				$("#cart_sum, .cart_total_sum").text(data.total_cost);
				console.log(data);
			}
		});
	}
}


//==================================== END Cart ========================================










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
	    	//return console.log('Установлена высота для: ' + element);
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



	

	$('.arrow__up').on('click', function(){
		var val = $('.product__count').val();
			val = parseInt(val) + 1;
		$('.product__count').val(val);
	});

	$('.arrow__down').on('click', function(){
		var val = $('.product__count').val();
			
			if(val <= 1) {
				return $('.product__count').val(1);
			}
			
			val = parseInt(val) - 1;
			$('.product__count').val(val);
	});

	$('.product__count').on('change', function(){
		var val = $('.product__count').val();
			if(val <= 1) {
				$('.product__count').val(1);
			}
	});
	/*
	 * Корзина удалить добавить	 
	 */
	


	//var cart = {
	//	// Добавляем количество товаров
	//	addCount: function(element){
	//		var input = element.find('.table__cart_input'),
	//			val = parseInt(input.val());
	//		input.val(val + 1);
    //
	//		this.updatePrice(input.val(), element);
	//
	//	},
	//
	//	// Удаляем
	//	removeCount: function(element){
	//		var input = element.find('.table__cart_input'),
	//			val = parseInt(input.val());
	//
	//		input.val(val - 1);
	//
	//		this.updatePrice(input.val(), element);
	//		this.checkCount(input.val(), element);
	//	},
    //
	//	checkCount: function(input, element) {
	//		if (input < 1) {
	//			element.parent().css('display', 'none');
	//		}
	//	},
    //
	//	updatePrice: function(multiplier, element) {
	//		var price = element.parent().find('.table__cart_price').html(), // Получаем значение из строки
	//			price = price.replace(/\s+/g, ''), // Удаляем пробелы из строки
	//			result = parseInt(price) * multiplier + "", // Переводим в число, умножаем и переводим в строку
	//			output = result.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 '); // Делим число в строке на разряды
    //
	//		element.parent().find('.table__cart_total').html(output); // Выводим в корзину
	//		this.updateTotal();
	//	},
    //
	//	updateTotal: function(){
	//		var arr = [];
	//
	//		for(var i=0; i<$('.table__cart_total').length; i++) {
	//			var total = $('.table__cart_total')[i];
	//			total = $(total).html();
	//			total = total.replace(/\s+/g, '');
	//			total = parseInt(total);
	//			arr.push(total);
	//		}
	//
	//		var result = arr.reduce(function(sum, current) {
	//		  return sum + current;
	//		}, 0);
    //
	//		$('.cart__sum_black').html(result + "руб.")
	//	}
	//}

	/*
	 * Slider for price
	 */
	



	
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
	  //arrows: true,
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



// set phone masck
	$('input[name="phone"]').mask("+7 (999) 999-99-99",{placeholder:"_"});


});

//# sourceMappingURL=main.js.map



/*
 jQuery Masked Input Plugin
 Copyright (c) 2007 - 2015 Josh Bush (digitalbush.com)
 Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
 Version: 1.4.1
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});

