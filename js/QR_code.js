function htmlEncode (value){
  return $('<div/>').text(value).html();
}

$(document).ready(function(){
	var qr =$('#qr').val(); 
	$(".qr-code").attr("src", "https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode(qr) + "&chs=160x160&chld=L|0");
})
    