/* --- UTILITY FUNCTIONS --- */

/* Generic functions */
function getObject(obj) {
	var theObj;
	if (document.all) {
		if (typeof obj=="string") {
			return document.all(obj);
		} else {
			return obj.style;
		}
	}

	if (document.getElementById) {
		if (typeof obj=="string") {
			return document.getElementById(obj);
		} else {
			return obj.style;
		}
	}
	return null;
};

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

/* Smooth Scroll */
function smoothTo(t) {
	var targetOffset = $(t).offset().top;
	$('html,body').animate({scrollTop: targetOffset}, 420);
	return false;
};

/* Basic item toggler with parameters for one extra hide/show item (buttons, etc) */
function toggle(t,hide,show) {
	if (hide === undefined) { hide = "false"; }
	if (show === undefined) { show = "false"; }
	
	if (hide != "false") {
		$(hide).fadeOut("fast", function() {
			$(t).slideToggle("fast", function() {
				if (show != "false") {
					$(show).fadeIn("fast");
				}
			});
		});
	} else {
		$(t).slideToggle("fast", function() {
			if (show != "false") {
				$(show).fadeIn("fast");
			}
		});
	}
};

/* Select all checkboxes within tgt */ 
function selectAll(tgt, src) {
	var toggle = $(src).is(":checked");
	$(tgt + " input[type=checkbox]").each(function() {
		$(this).attr("checked", toggle);
		$("li.select-all input").attr("checked", toggle);
	});
};

/* Basic Overlays */
function overlay() {
	$("#svo").dialog("open");
};
function closeOverlay() {
	$("#svo").dialog("close");
};
function simp_overlay() {
	$(".simp-overlay").removeClass('none');
};
function simp_closeOverlay() {
	$(".simp-overlay").addClass('none');
};


/* Welcome Message Overlay */
function overlayWelcome() {
	$("#welcome-message").dialog("open");	
};
   
function closeOverlayWelcome() {
	$("#welcome-message").dialog("close");
};


/* Wufoo Survey Overlay */
function overlayWufoo() {
	$("#wufoo-form").dialog("open");
};
function closeOverlayWufoo() {
	$("#wufoo-form").dialog("close");
};


/* Add/Edit Site Page */
function overlayPageTemplate() {
	initPagePreview();
	$("#page-preview-buttons").hide();
	$("#page-template-preview-note").show();
	$("#page-template").dialog("open");
};

function closeOverlayPageTemplate() {
	$("#page-template").dialog("close");
};

function overlayPagePreview() {
	initPagePreview();
	$("#page-template-preview-note").hide();
	$("#page-preview-buttons").show();
	$("#page-template").dialog("open");
};

function closeOverlayPagePreview() {
	$("#page-template").dialog("close");
};

function centerDialog($dialog) {
	$dialog.dialog("option", "position", {my: "center", at: "center", of: window});
}

function initPagePreview() {
	var h = $(document).height();
	$("#page-template-preview").html('<iframe allowTransparency="true" frameborder="0" scrolling="yes" style="width: 100%; height: ' + h + 'px; border: none;" src="/pagePreview"></iframe>');
	$("html, body").scrollTop(0);
}

/* Referral Program Landing Page -- Twitter & Facebook Pop-Ups */
function tweetpopup(url) {
	window.open( "http://twitter.com/share?url=http%3A%2F%2F" + url + "&text=I'm%20using%20LeagueApps%20to%20manage%20my%20sports%20organization,%20tournaments,%20and%20events.&via=LeagueApps&count=none/", "tweet", "height=450,width=550,resizable=1" ) 
};

function facebookpopup(url) {
	window.open( "http://www.facebook.com/sharer.php?u=http%3A%2F%2F" + url + "&t=I'm%20using%20LeagueApps%20to%20manage%20my%20sports%20organization,%20tournaments,%20and%20events.", "sharer", "height=640,width=550,resizable=1" ) 
};

/* Site Notices (confirmations, etc) */
function showNotice(c,s) {
	if (s === undefined) {
		s = 10000;
	} else {
		s *= 1000;
	}
	$("#svl-msg").addClass(c);
	$("#svl-msg").prepend("<a class=\"site-toggle view-toggle\" onclick=\"hideNotice(true);\"></a>");
	if (s > 0) {
		$("#svl-msg").fadeIn(420).animate({opacity:1}, s, function() {
			hideNotice();
		});
	} else {
		$("#svl-msg").fadeIn(420);
	}
};
function hideNotice(isClicked) {
	if (isClicked) { $("#svl-msg").stop(); }
	$("#svl-msg").slideUp("fast");
};

/* Ajax Validation */
function ajaxValidateUniqueValue(param, value, oldValue) {
	var indicatorId = '#' + param + '-available';
	if (oldValue != null) {
		oldValue = oldValue.toLowerCase();
	}	
	if (value != null && value != "" && value.toLowerCase() != oldValue) {
		$.ajax({
			type: "POST",
			url: "/ajax/validate",
			data: param + "=" + value,
			success: function(msg) {
				$(indicatorId).html(msg);
				if (msg.indexOf("success") >= 0) {
					$(indicatorId).removeClass();
					$(indicatorId).addClass("id-good");
				} else {
					$(indicatorId).removeClass();
					$(indicatorId).addClass("id-bad");
				}
				$(indicatorId).fadeIn("fast");
			}
		});
	} else {
		$(indicatorId).html("");
		$(indicatorId).removeClass();
	}
};

/* Character counter (for text areas) */
function toCount(entrance,exit,text,characters) {
	var entranceObj=getObject(entrance);
	var exitObj=getObject(exit);
	var length=characters - entranceObj.value.length;
	if (length <= 0) {
		length=0;
		text='<span class="disable"> '+text+' </span>';
		//entranceObj.value=entranceObj.value.substr(0,characters-1); // this was setting removing the ability to use the last character
	}
	exitObj.innerHTML = text.replace("{CHAR}",length);
};

/* Basic Password Matching (faux Ajax) */
function passMatch(root, match) {
	if (root != "" && match != "") {
		if (root != match) {
			$("#password-match").html("Oops, your passwords don't match!");
			$("#password-match").removeClass();
			$("#password-match").addClass("id-bad");
		} else {
			$("#password-match").html("Good to go.");
			$("#password-match").removeClass();
			$("#password-match").addClass("id-good");
		}
	} else {
		$("#password-match").html("");
		$("#password-match").removeClass();
	}
};

/* Ajax Game Results */
function setGameResultFields(id, state) {
	console.log(state);
	if (state == "PLAYED_REGULAR_TIME" || state == "PLAYED_OVERTIME") {
		$(id).find(".game-results ol li:nth-child(1)").slideDown("fast");
		$(id).find(".game-results ol li:nth-child(2)").slideDown("fast");
		$(id).find(".game-results #excludeStandingsText").slideDown("fast");
		$(id).find(".game-results ol li:nth-child(3)").hide();
		$(id).find(".game-results ol li:nth-child(5)").hide();
	} else if (state == "DEFAULT") {
		$(id).find(".game-results ol li:nth-child(1)").hide();
		$(id).find(".game-results ol li:nth-child(2)").hide();
		$(id).find(".game-results ol li:nth-child(5)").hide();
		$(id).find(".game-results #excludeStandingsText").hide();
		$(id).find(".game-results ol li.forfeit-winner").slideDown("fast");
	} else if (state == "RESCHEDULED") {
		$(id).find(".game-results ol li:nth-child(1)").hide();
		$(id).find(".game-results ol li:nth-child(2)").hide();
		$(id).find(".game-results ol li:nth-child(3)").hide();
		$(id).find(".game-results ol li:nth-child(5)").hide();
		$(id).find(".game-results #excludeStandingsText").hide();
	} else if (state == "CANCELED" ){
        $(id).find(".game-results ol li:nth-child(1)").hide();
        $(id).find(".game-results ol li:nth-child(2)").hide();
        $(id).find(".game-results ol li:nth-child(3)").hide();
        $(id).find(".game-results #excludeStandingsText").hide();
        $(id).find(".game-results ol li:nth-child(5)").slideDown("fast");
    }
};
function showGameResults(id, refresh) {
	// save previous game state
	var origState = $(id).find(".game-results li:nth-child(4) select").val();
	var gameState = origState;
	setGameResultFields(id, gameState);
	
	// bind button actions
	$(id).find(".alt-btn").unbind();
	$(id).find(".std-btn").unbind();
	$(id).find(".alt-btn").click(function() { cancelGameResults(id, origState); });
	$(id).find(".std-btn").click(function() { 
		
		var onSuccess = function(parent, scores, status, msg) {
				parent.find(".game-results").slideUp("fast", function() {
					parent.find(".teams span.score").each(function(i) {
						$(this).removeClass("winner");
						if (scores[i] == 'W') { 
							$(this).addClass("winner"); 
						}
						$(this).html(scores[i]);
					});
					parent.find(".teams abbr").html(status);
					parent.find(".teams strong").slideDown("fast");
				});
				if (refresh) {
					//setInterval(function(){ window.location.reload() }, 1000);
					setTimeout(function(){ window.location.reload() }, 1000);
				}
		};
	
		saveGameResults("/ajax/editGameResult", id, gameState, onSuccess);
	});
	
	// Handle "edit" behavior -> auto-fill form fields
	if ( $(id).find("span.score").html() != null) {
		var scores = [];
		$(id).find("span.score").each(function(i) { scores[i] = $(this).html(); });
		$(id).find(".game-results input[type=text]").each(function(i) { $(this).val(scores[i]); });
	}
	
	// Set custom behaviors when game state changes
	$(id).find(".game-results li:nth-child(4) select").change(function() {
		gameState = $(this).val();
		setGameResultFields(id, gameState);
	});
	
	// Hide display and show form
	$(id).find("td.teams strong").hide();
	$(id).find(".game-results").slideDown("fast");
};
function saveGameResults(reqUrl, id, state, onSuccess) {
	var scores = [];
	var err = false;
	var winner = 2; // 2 == tie
	var status = "";
    var notify = $(id).find("form li:nth-child(5)  input:checkbox[name=notify]").is(':checked');
	
	// set status display
	if (state == "PLAYED_OVERTIME") { 
		status = "Played (overtime)"; 
	} else if (state == "PLAYED_REGULAR_TIME") {
		status = "Played (regular time)"; 
	} else if (state == "DEFAULT") { 
		status = "Forfeit"; 
	} else if (state == "CANCELED") { 
		status = "Canceled"; 
	} else if (state == "RESCHEDULED") { 
		status = "Rescheduled"; 
	} else { 
		status = ""; 
	}
	
	// parse data based on game status
	if (state == "PLAYED_REGULAR_TIME" || state == "PLAYED_OVERTIME") {
		$(id).find(".game-results input[type=text]").each(function(i) { 
			scores[i] = $(this).val(); 
		});
		$(id).find(".game-results li").removeClass("error");
		
		// input field error checking
		if ( (scores[0] == null) || ((scores[0] * 1) != scores[0]) || (scores[0] < 0) || (scores[0] == "") ) {
			$(id).find("form ol li:nth-child(1)").addClass("error");
			err = true;
		}
		if ( (scores[1] == null) || ((scores[1] * 1) != scores[1]) || (scores[1] < 0) || (scores[1] == "") ) {
			$(id).find("form ol li:nth-child(2)").addClass("error");
			err = true;
		}
		
		// determine winner (for styling only)
		if (scores[0] * 1 > scores[1] * 1) { winner = 0; }
		else if (scores[0] * 1 < scores[1] * 1) { winner = 1; }
		
	} else if (state == "DEFAULT") {
		winner = $(id).find(".game-results li:nth-child(3) select").val() * 1;
		scores[0] = "L";
		scores[1] = "L";
		if (winner == 0) { scores[0] = "W"; }
		else { scores[1] = "W"; }
	} else { // CANCEL OR RESCHED
		scores[0] = "";
		scores[1] = "";
	}
	
	var sid = $("#sid").val();
	var lid = $("#lid").val();
	
	var excludeTeam1 = $(id).find(".game-results #exclude-team-1").is(':checked');
	var excludeTeam2 = $(id).find(".game-results #exclude-team-2").is(':checked');

	var reqData = "gameId=" + id.replace(/#game-/, '').replace(/#edit-score-/, '') + "&team1Score=" + scores[1] + "&team2Score=" + scores[0] + "&excludeTeam1=" + excludeTeam1 + "&excludeTeam2=" + excludeTeam2 + "&gameState=" + state + "&sid=" + sid + "&lid=" + lid+"&notifyParticipants=" + notify;
	
	if (err == false) {
		jQuery.ajax({
			type: "POST",
			url: reqUrl,
			data: reqData,
			cache: false,
			success: function(msg) {
				showSystemMessages(msg, 5);
				var status = $("#status").val();
				if (status == 'success') {
					if (typeof onSuccess == 'function') {
						onSuccess($(id), scores, status, msg);
					}
				}
			}
		});
	}
};
function cancelGameResults(id, state) {
	$(id).find(".game-results").slideUp("fast", function() {
		$(id).find(".teams strong").slideDown("fast");
		$(id).find(".game-results li:nth-child(4) select").val(state);
		setGameResultFields(id, state);
		$(id).find(".game-results li").removeClass("error");
	});
};

/* Credit Card Convenience */
function getCardType(n) {
	var cc = "cc-";
	if (n.substring(0,1) == "4") {
		if (n.length == "16") {
			cc += "visa";
		}
	}
	if ((n.substring(0,2) >= "51") && (num.substring(0, 2) <= "55")) {
		if (n.length == "16") {
			cc += "mc";
		}
	}
	if (n.substring(0,4) == "6011") {
		if (n.length == "16") {
			cc += "discover";
		}
	}
    if ((n.substring(0,2) == "34") || (n.substring(0,2) == "37")) {
		if (n.length == "15") {
			cc += "amex";
		}
	}
	return cc;
};
function ccNiceName(cc) {
	if (cc == "cc-visa")
		return "Visa";
	if (cc == "cc-amex")
		return "American Express";
	if (cc == "cc-mc")
		return "Master Card"; 
	if (cc == "cc-discover")
		return "Discover";
	return null;
};


$.fn.select_datepicker = function(options) {

	var dayTarget = $(this).find(".day");
	var monthTarget = $(this).find(".month");
	var yearTarget = $(this).find(".year");

	var refreshDate = function() {
		var date = datepicker.datepicker('getDate');
		if (date) {
			dayTarget.val(date.getDate());
			monthTarget.val(date.getMonth());
			yearTarget.val(date.getFullYear());
		}
	};
	
	var setSelectedDate = function() {
		var date = null;
		if (monthTarget.val().length > 0 && yearTarget.val().length > 0 && dayTarget.val().length > 0) {
			date = new Date(yearTarget.val(), monthTarget.val(), dayTarget.val());
		}
		datepicker.datepicker('setDate', date);
	}
	
	var onSelect = options.onSelect;
	options.onSelect = function(value, inst) { 
		if (onSelect) {
			onSelect.apply(this, [value, inst]);		
		}
		refreshDate();
	};

	var datepicker = $(this).find("input.datepicker").datepicker(options);

	refreshDate();
	
	dayTarget.change(function() {
		if (dayTarget.val().length > 0) {
			if (dayTarget.val() <= 0) {
				dayTarget.val(1);
			} else if (dayTarget.val() > 31) {
				dayTarget.val(31);
			}
		}
		setSelectedDate();
		refreshDate();
	});		
	
	monthTarget.change(function() {
		if (monthTarget.val().length > 0) {
			if (monthTarget.val() < 0) {
				monthTarget.val(11);
			} else if (monthTarget.val() > 11) {
				monthTarget.val(11);
			} 
		}	
		setSelectedDate();
		refreshDate();
	});
			
	yearTarget.change(function() {
		setSelectedDate();
		refreshDate();
	});		
}

function initIToggles(containerElement) {
	/* Simple On/Off Toggles */
	var toggles = containerElement ? $(containerElement).find(".iToggle input") : $(".iToggle input");
	toggles.change(function() {
		var t = $(this).parent();
		if ( $(t).hasClass("on") ) {
			$(t).removeClass("on");
			$(t).find(".slider").animate({left: "0px"}, 142);
			$(t).find(".on-label").animate({left: "-31px"}, 142);
			$(t).find(".off-label").animate({left: "31px"}, 142);
		} else {
			$(t).addClass("on");
			$(t).find(".slider").animate({left: "31px"}, 142);
			$(t).find(".on-label").animate({left: "0"}, 142);
    		$(t).find(".off-label").animate({left: "62px"}, 142);
		}
	});
	
	var toggleCBs = containerElement ? $(containerElement).find(".iToggle input[type=checkbox]") : $(".iToggle input[type=checkbox]");
	toggleCBs.each(function() {
		if ($(this).is(":checked")) {
			$(this).parent().removeClass();
			$(this).parent().addClass("on");
			$(this).parent().find(".slider").animate({left: "31px"}, 142);
			$(this).parent().find(".on-label").animate({left: "0"}, 142);
			$(this).parent().find(".off-label").animate({left: "62px"}, 142);
		}
	});
}

function initStyledInputs(containerElement) {
	/*
	style checkboxes & radios
	3.31.14 by Jdoan
	*/
	var $styled_check = containerElement ? $(containerElement).find('label.styled-check') : $('label.styled-check');
	var $styled_check_input = $styled_check.find('input[type=checkbox], input[type=radio]');
	$styled_check_input.each(function(){
		var $this = $(this);
		var $this_label = $this.parent();
		if($this.prop('checked')==true){
			$this_label.addClass('checked');
		}
	});
	$styled_check_input.on('change', function(){
		var $this = $(this);
		var $this_label = $this.parent();
		var $this_type = $this.attr('type');
		var $this_name = $this.attr('name');
		if ($this_name && $this_name.indexOf('.') !== -1) {
			var $this_name_stripped = $this_name.split('.');
			$this_name = $this_name_stripped[0]+'\\.'+$this_name_stripped[1];
		}
		
		if($this_type=='radio'){
			$('input[name='+$this_name+']').parent().removeClass('checked');
			$this_label.addClass('checked');
			/*if(($this_label.parent().hasClass('has-dependent'))&&($this.val()==1)){
				$this_label.parent().next('label').attr('data-disabled','no');
				$this_label.parent().next('label').find('input').prop('disabled', false);
			}else{
				$this_label.parent().next('label').attr('data-disabled','yes');
				$this_label.parent().next('label').find('input').prop('disabled', true);
			}*/
		}else{
			if($this.prop('checked')==true){
				$this_label.addClass('checked');
			}else{
				$this_label.removeClass('checked');
			}
		}
	});

	var $has_check = containerElement ? $(containerElement).find('.has-check') : $('.has-check');
	$has_check.on('keyup blur',function(){
		var $this = $(this);
		var label = $this.parent().find('label.styled-check:first');
		var checkbox = $this.parent().find('label.styled-check:first input');
		var ul = $this.parent().find('ul:first');
		if($this.val()!=''){
			label.addClass('checked');
			checkbox.prop('checked',true);
			if($this.hasClass('has-sub-list')){
				ul.slideDown();
			}
		}else{
			label.removeClass('checked');
			checkbox.prop('checked',false);
			if($this.hasClass('has-sub-list')){
				ul.slideUp();
			}
		}
	});
}

/* --- ON READY EVENTS --- */
$(function() {

	initStyledInputs();

	/* Autofill Form Fields */
	$(".autofill").hover(
		function() {
			if (!$(this).hasClass("active-field")) {
				$(this).addClass("field-on");
			}
		},
		function() {
			if (!$(this).hasClass("active-field")) {
				$(this).removeClass("field-on");
			}
		}
	);
	$.each($(".autofill"), function() {
		var val = $(this).attr("title");
		if ($(this).val() == "") {
			$(this).val(val);
		}
		
		$(this).focus(function() {
			$(this).addClass("active-field");
			if ($(this).val() == val) {
				$(this).val("");
			}
			$(this).addClass("field-on");
		});
		$(this).blur(function() {
			if ($(this).val() == "") {
				$(this).removeClass("active-field");
				$(this).removeClass("field-on");
				$(this).val(val);
			}
		});
	});
	
	/* Password Match Check */
	$(".pass-check-root").bind("keyup blur", function() {
		passMatch( $(this).val(), $(".pass-check-confirm").val() );
	});
	$(".pass-check-confirm").bind("keyup blur", function() {
		passMatch( $(".pass-check-root").val(), $(this).val() );
	});
	
	initIToggles();
	
	/* SMALL On/Off Toggles */
	$(".iToggleSmall input").change(function() {
		var t = $(this).parent();
		//alert("id of t parent: " + $(this).parent().attr("id"));
		if ( $(t).hasClass("on") ) {
			$(t).removeClass("on");
			$(t).find(".slider").animate({left: "0px"}, 142);
			$(t).find(".on-label").animate({left: "-20px"}, 142);
			$(t).find(".off-label").animate({left: "20px"}, 142);
		} else {
			$(t).addClass("on");
			$(t).find(".slider").animate({left: "19px"}, 142);
			$(t).find(".on-label").animate({left: "0"}, 142);
			$(t).find(".off-label").animate({left: "39px"}, 142);
		}
	});
	$(".iToggleSmall input[type=checkbox]").each(function() {
		if ($(this).is(":checked")) {
			$(this).parent().removeClass();
			$(this).parent().addClass("on");
			$(this).parent().find(".slider").animate({left: "20px"}, 142);
			$(this).parent().find(".on-label").animate({left: "0"}, 142);
			$(this).parent().find(".off-label").animate({left: "39px"}, 142);
		}
	});


	
	/* Schedule Notes */
	$(".day-note").hover(
		function() {
			$(this).find(".day-note-full").fadeIn(84);
		},
		function() {
			$(this).find(".day-note-full").fadeOut(84);
		}
	);
	
	/* CC Type Check */
	$("#creditCardNumber").keyup(function() {
		$(".cc-icons span").removeClass().hide();
		$(".cc-icons span").addClass(getCardType($(this).val())).fadeIn("fast");
		if (getCardType($("#creditCardNumber").val()) != "cc-") {
			$("#creditCardType").val( ccNiceName(getCardType($("#creditCardNumber").val())) );
		}
	});
	
	/* Tool Tip Init */
	if (jQuery().tipsy) {
		$("[rel=tipsy]").tipsy({
			fade: true,
			gravity: "s",
			html: true
		});
		$("[rel=tipsy-sans]").tipsy({
			fade: true,
			gravity: "s",
			html: true
		});
		$("[rel=tipsy]").each(function() {
			$(this).css("cursor", "help");
		});
	}
	
	/* Init Basic Modal Dialogs */
	if (jQuery().dialog) {
		$("#svo").dialog({
			autoOpen: false,
			bgiframe: true,
			draggable: false,
			resizable: false,
			minHeight: 21,
			modal: true
		});
		$("#overlay").dialog({
			autoOpen: false,
			bgiframe: true,
			draggable: false,
			resizable: false,
			minHeight: 21,
			modal: true
		});
	}
	
	if (jQuery().dialog) {
	
		$("#page-template").dialog({
			autoOpen: false,
			bgiframe: true,
			draggable: false,
			resizable: false,
			minHeight: 600,
			width: 1000,
			closeOnEscape: false,
			modal: true,
			  
		});
	}

	
	
	/* Init Basic Modal Dialogs */
	if (jQuery().dialog) {
		
		/*
		$('#wufoo-form').bind('dialogclose', function(event) {
			closeOverlayWufoo();
		 }); 
		*/
		
		$("#wufoo-form").dialog({
			autoOpen: true,
			bgiframe: true,
			draggable: false,
			resizable: false,
			width: 500,
			minHeight: 21,
			modal: true,
			close: function() {
			   $("#welcome-message").dialog({
				 autoOpen: true,
				 bgiframe: true,
				 draggable: false,
				 resizable: false,
				 width: 625,
				 minHeight: 21,
				 modal: true,
				 closeOnEscape: false,
	   			 open: function(event, ui) { $(".ui-dialog-titlebar", $(this).parent()).hide(); }
			   });
			}
		});
	}

	// apply .checked class to label for radio / checkboxes
	$('input[type=radio].lg').click(function(){
		var $this = $(this);
		var $parent = $this.parent();
		if($parent.is('label')){
			$('label.blk').removeClass('checked');
			$parent.addClass('checked');
		}
	});

	$('input[type=radio].user-origin').click(function(){
		var $this = $(this);
		var $parent = $this.parent();
		if($parent.is('label')){
			$('label.user-origin').removeClass('checked');
			$parent.addClass('checked');
		}
	});

	$('input[type=radio].user-origin-select').click(function(){
		var $this = $(this);
		var $parent = $this.parent();
		if($parent.is('label')){
			$('label.user-origin-select').removeClass('checked');
			$parent.addClass('checked');
		}
	});

	/*$('label').click(function(){
		var $this = $(this);
		var $child = $this.attr('for');
		//alert($child);
		$('#'+$child).click();
	});*/

});

function findParentElementByClassName(nestedEl, parentElClass) {
	var $parentEl = $(nestedEl).parent();
	while ($parentEl.length > 0) {
		if ($parentEl.hasClass(parentElClass)) {
			return $parentEl;
		} else {
			$parentEl = $parentEl.parent();
		}
	}
	return null;
}