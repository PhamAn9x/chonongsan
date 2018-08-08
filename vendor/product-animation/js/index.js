!(function($){
	$(function(){
		$('.product-item').each(function(){
			var thisEl = $(this),
				btnPlus = thisEl.find('.btn-plus'),
				btnMinus = thisEl.find('.btn-minus'),
				fieldQtt = thisEl.find('input[name="qtt"]'),
				itemPriceEl = thisEl.find('.item-price'),
				price = itemPriceEl.data('price');
				
				btnPlus.click(function(){
					qttValue = parseInt(fieldQtt.val());
					fieldQtt.val( qttValue + 1 );
					
					itemPriceEl.html( '$'+(qttValue + 1) * price );
				})
				btnMinus.click(function(){
					qttValue = parseInt(fieldQtt.val()) - 1;
					var newQTT = (qttValue <= 1)? 1 : qttValue;
					fieldQtt.val( newQTT );
					
					itemPriceEl.html( '$'+newQTT * price );
				})
				
		})
	})
})(jQuery)