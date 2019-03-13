/* Theme: 	Default
			Live Edits
----------------------------------------- */

$(function() {
	/* Auto-adjust sidebar heights */
	if ($("#content").hasClass("right-col") || $("#content").hasClass("left-col")) {
		// add in 1s delay to allow DOM to fully load
		setTimeout(function(){
			// if purchase page
			var $purchase_path = '/purchase';
			var $reg_context = '/registration/context';
			var $prods_context = '/registration/products';
			var $store_context = '/store';
			if(($purchase_path==location.pathname)||($reg_context==location.pathname)){
				var $aside = document.getElementById('aside').offsetHeight;
				var $main = document.getElementById('main').offsetHeight;
				if ($aside < $main) {
					var newH = $main + "px";
					$("#aside").css("height", newH);
				}
			}else if($prods_context==location.pathname||$store_context==location.pathname){
				if ($("div.aside").height() < $(".main").height()) {
					var newH = $(".main").height() + "px";
					$("div.aside").css("min-height", newH);
				}
			}else{
				if ($("div.aside").height() < $(".main").height()) {
					var newH = $(".main").height() + "px";
					$("div.aside").css("min-height", newH);
				}
			}
		}, 1000);
	}
	//alert(location.pathname);

});