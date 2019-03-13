/* UTILITY FUNCTIONS
-------------------- */

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

/* Smooth Scroll */
function smoothTo(t) {
	var targetOffset = $(t).offset().top;
	$('html,body').animate({scrollTop: targetOffset}, 420);
	return false;
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

/* Registration Button Handling */
function handleReg(newRegFlow, regUserId, groupAccountId, smallGroupId, baseEventId, teamId, showStaffReg, staffRegRoles, ppAvailableForStaffReg, 
		showTeamCaptainReg, ppAvailableForTeamCaptainReg, showDirectTeamPlayerReg, ppAvailableForTeamPlayerReg, showFreeAgentReg, showSmallGroupReg, ppAvailableForFreeAgentReg, 
		eventRegStatusName, usingVariableTeamFee, teamPrice, teamPlayerPrice, freeAgentPrice, usingProcessingFee, percentageProcessingFee, individualProcessingFee, teamProcessingFee, 
		hasAdditionalTeamFee, additionalTeamFee, hasMembershipFee, membershipFee, minTeamPlayerCount, teamLabel, captainLabel, freeAgentLabel, smallGroupLabel, processingFeeLabel, additionalTeamFeeLabel, sample) {
		
		var isSessionReg = false;
		handleReg(newRegFlow, regUserId, groupAccountId, smallGroupId, baseEventId, teamId, showStaffReg, staffRegRoles, ppAvailableForStaffReg, 
		showTeamCaptainReg, ppAvailableForTeamCaptainReg, showDirectTeamPlayerReg, ppAvailableForTeamPlayerReg, showFreeAgentReg, showSmallGroupReg, ppAvailableForFreeAgentReg, 
		eventRegStatusName, usingVariableTeamFee, teamPrice, teamPlayerPrice, freeAgentPrice, usingProcessingFee, percentageProcessingFee, individualProcessingFee, teamProcessingFee, 
		hasAdditionalTeamFee, additionalTeamFee, hasMembershipFee, membershipFee, minTeamPlayerCount, teamLabel, captainLabel, freeAgentLabel, smallGroupLabel, processingFeeLabel, additionalTeamFeeLabel, sample, isSessionReg);
		
};
function handleReg(newRegFlow, regUserId, groupAccountId, smallGroupId, baseEventId, teamId, showStaffReg, staffRegRoles, ppAvailableForStaffReg, 
		showTeamCaptainReg, ppAvailableForTeamCaptainReg, showDirectTeamPlayerReg, ppAvailableForTeamPlayerReg, showFreeAgentReg, showSmallGroupReg, ppAvailableForFreeAgentReg, 
		eventRegStatusName, usingVariableTeamFee, teamPrice, teamPlayerPrice, freeAgentPrice, usingProcessingFee, percentageProcessingFee, individualProcessingFee, teamProcessingFee, 
		hasAdditionalTeamFee, additionalTeamFee, hasMembershipFee, membershipFee, minTeamPlayerCount, teamLabel, captainLabel, freeAgentLabel, smallGroupLabel, processingFeeLabel, additionalTeamFeeLabel, sample, isSessionReg) {

	if (showTeamCaptainReg == true) {
		$("#reg-captain").show().removeClass('reg-hidden');
		//removing reg-details: story #1552
		//var captainRegHtml = "<strong>" + teamLabel + " " + captainLabel + "</strong> <em>Register a full " + teamLabel + ".<br/><span style='font-size:11px;'>(All " + teamLabel + " members will register as a " + teamLabel + " Player)</span></em>";
		
		var captainRegHtml = "<strong>" + teamLabel + " " + captainLabel + "</strong>";
		$("#reg-captain .reg-details").html(captainRegHtml);
		
		if (eventRegStatusName == "SOLD_OUT" || eventRegStatusName == "ONLY_FREE_AGENTS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_TEAM_PLAYERS_AND_FA" || eventRegStatusName == "ONLY_STAFF_MEMBERS" || eventRegStatusName == "CANCELED") {
			$("#reg-captain-url").attr("href", "#");
		} else {
			$("#reg-captain-url").attr("href", "/registration?bid=" + baseEventId 
					+ (regUserId != null ? "&regUserId=" + regUserId : "") 
					+ (groupAccountId != null ? "&groupAccountId=" + groupAccountId : "") 
					+ "&type=Captain");
		}
		
		var teamPriceDisplay;
		if (eventRegStatusName == "SOLD_OUT") {
			teamPriceDisplay = "Sold Out";
		} else if (eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_FREE_AGENTS" || eventRegStatusName == "ONLY_TEAM_PLAYERS_AND_FA" || eventRegStatusName == "ONLY_STAFF_MEMBERS") {
			teamPriceDisplay = "Closed";
		} else if (eventRegStatusName == "CANCELED") {
			teamPriceDisplay = "Canceled";
		} else {
			if (usingVariableTeamFee) {
				teamPriceDisplay = formatCurrency(teamPlayerPrice) + " per player";
//				if (minTeamPlayerCount > 0) {
//					teamPriceDisplay += " (" + formatCurrency(teamPlayerPrice * minTeamPlayerCount) + " minimum)";
//				}
				if (usingProcessingFee) {
					teamPriceDisplay = teamPriceDisplay + "<em>+ "+ formatCurrency(individualProcessingFee) + " " + processingFeeLabel + " per player</em>";
				}
			} else {
				teamPriceDisplay = formatCurrency(teamPrice);
				if (usingProcessingFee) {
					teamPriceDisplay = teamPriceDisplay + "<em>+ "+ formatCurrency(teamProcessingFee) + " " + processingFeeLabel + "</em>";
				}
			}
			if (hasAdditionalTeamFee) {
				teamPriceDisplay = teamPriceDisplay + "<em>+ "+ formatCurrency(additionalTeamFee) + " " + additionalTeamFeeLabel + "</em>";
			}
			if (percentageProcessingFee > 0) {
				teamPriceDisplay += "<em>+ " + percentageProcessingFee + "% " + processingFeeLabel + "</em>";
			}
			if (hasMembershipFee) {
				teamPriceDisplay = teamPriceDisplay + "<em>+ "+ formatCurrency(membershipFee) + " Membership Fee</em>";
			}
		}
		$("#reg-captain-price").html(teamPriceDisplay);
		if (ppAvailableForTeamCaptainReg) {
			$('#reg-captain-price').append('<em>Payment Plans Available</em>');
		}
	} else {
		$("#reg-captain").hide().addClass('reg-hidden');
	}
	
	if (showDirectTeamPlayerReg == true) {
		$("#reg-team").show().removeClass('reg-hidden');
		//removing reg-details: story #1552
		//var playerRegHtml = "<strong>" + teamLabel + " Player</strong> <em>Join your " + captainLabel + "'s registered " + teamLabel + ".</em>";
		
		var playerRegHtml = "<strong>" + teamLabel + " Player</strong>";
		$("#reg-team .reg-details").html(playerRegHtml);
		
		if (eventRegStatusName == "CANCELED" || eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_FREE_AGENTS" || eventRegStatusName == "ONLY_STAFF_MEMBERS") {
			$("#reg-team-url").attr("href", "#");
		} else {
			$("#reg-team-url").attr("href", "/registration?bid=" + baseEventId 
					+ (regUserId != null ? "&regUserId=" + regUserId : "") 
					+ (groupAccountId != null ? "&groupAccountId=" + groupAccountId : "") 
					+ "&type=Team" + (teamId != null ? "&teamId=" + teamId : ""));
		}

		var teamPlayerPriceDisplay;
		if (eventRegStatusName == "CANCELED") {
			teamPlayerPriceDisplay = "Canceled";
		} else if (eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_FREE_AGENTS" || eventRegStatusName == "ONLY_STAFF_MEMBERS") {
			teamPlayerPriceDisplay = "Closed";
		} else {
			if (percentageProcessingFee > 0) {
				teamPlayerPriceDisplay += "<em>+ " + percentageProcessingFee + "% " + processingFeeLabel + "</em>";
			}
			if (hasMembershipFee) {
				teamPlayerPriceDisplay = "<em>"+ formatCurrency(membershipFee) + " Membership Fee</em>";
			}
			else{
				teamPlayerPriceDisplay = "<em style=\"font-size:10px;\"></em>";
			}
		}
		$("#reg-team-price").html(teamPlayerPriceDisplay);
		if (ppAvailableForTeamPlayerReg) {
			$('#reg-team-price').append('<em>Payment Plans Available</em>');
		}
	} else {
		$("#reg-team").hide().addClass('reg-hidden');
	}
	
	if (showFreeAgentReg == true) {
		$("#reg-fa").show().removeClass('reg-hidden');
		//removing reg-details: story #1552
		//var faRegHtml = "<strong>" +freeAgentLabel + "</strong> <em>Register solo and we'll find you a " + teamLabel + ".<br/><span style='font-size:11px;'>(" + teamLabel + " member requests available)</span></em>";
		
		var faRegHtml = "<strong>" +freeAgentLabel + "</strong>";
		$('#reg-fa .reg-details').html(faRegHtml);
		
		if (eventRegStatusName == "SOLD_OUT" || eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_STAFF_MEMBERS" || eventRegStatusName == "CANCELED") {
			$("#reg-fa-url").attr("href", "#");
		} else {
			$("#reg-fa-url").attr("href", "/registration?bid=" + baseEventId 
					+ (regUserId != null ? "&regUserId=" + regUserId : "") 
					+ (groupAccountId != null ? "&groupAccountId=" + groupAccountId : "") 
					+ "&type=FA");
		}
		
		var freeAgentPriceDisplay;
		if (isSessionReg == true) {
			freeAgentPriceDisplay = "";
		} else if (eventRegStatusName == "SOLD_OUT") {
			freeAgentPriceDisplay = "Sold Out";
		} else if (eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_STAFF_MEMBERS") {
			freeAgentPriceDisplay = "Closed";
		} else if (eventRegStatusName == "CANCELED") {
			freeAgentPriceDisplay = "Canceled";
		} else {
			freeAgentPriceDisplay = formatCurrency(freeAgentPrice);
			if (usingProcessingFee && freeAgentPriceDisplay != "Free") {
				freeAgentPriceDisplay = freeAgentPriceDisplay + "<em>+ "+ formatCurrency(individualProcessingFee) +" " + processingFeeLabel + "</em>";
			}
			if (percentageProcessingFee > 0 && freeAgentPriceDisplay != "Free") {
				freeAgentPriceDisplay += "<em>+ "+ percentageProcessingFee + "% " + processingFeeLabel + "</em>";
			}
			if (hasMembershipFee) {
				freeAgentPriceDisplay = freeAgentPriceDisplay + "<em>+ "+ formatCurrency(membershipFee) + " Membership Fee</em>";
			}
		}
		$("#reg-fa-price").html(freeAgentPriceDisplay);
		if (ppAvailableForFreeAgentReg) {
			$('#reg-fa-price').append('<em>Payment Plans Available</em>');
		}
	} else {
		$("#reg-fa").hide().addClass('reg-hidden');
	}

	if (showSmallGroupReg == true) {
		$("#reg-sg").show().removeClass('reg-hidden');
		
		var sgRegHtml = "<strong>" +smallGroupLabel + " Member</strong>";
		$('#reg-sg .reg-details').html(sgRegHtml);
		
		if (eventRegStatusName == "SOLD_OUT" || eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_STAFF_MEMBERS" || eventRegStatusName == "CANCELED") {
			$("#reg-sg-url").attr("href", "#");
		} else {
			$("#reg-sg-url").attr("href", "/registration?bid=" + baseEventId 
					+ (regUserId != null ? "&regUserId=" + regUserId : "") 
					+ (groupAccountId != null ? "&groupAccountId=" + groupAccountId : "") 
					+ "&type=FA&smallGroupReg=true" + (smallGroupId ? "&smallGroupId=" + smallGroupId : ""));
		}
		
		var freeAgentPriceDisplay;
		if (eventRegStatusName == "SOLD_OUT") {
			freeAgentPriceDisplay = "Sold Out";
		} else if (eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_STAFF_MEMBERS") {
			freeAgentPriceDisplay = "Closed";
		} else if (eventRegStatusName == "CANCELED") {
			freeAgentPriceDisplay = "Canceled";
		} else {
			freeAgentPriceDisplay = formatCurrency(freeAgentPrice);
			if (usingProcessingFee && freeAgentPriceDisplay != "Free") {
				freeAgentPriceDisplay = freeAgentPriceDisplay + "<em>+ "+ formatCurrency(individualProcessingFee) +" " + processingFeeLabel + "</em>";
			}
			if (percentageProcessingFee > 0 && freeAgentPriceDisplay != "Free") {
				freeAgentPriceDisplay += "<em>+ "+ percentageProcessingFee + "% " + processingFeeLabel + "</em>";
			}
			if (hasMembershipFee) {
				freeAgentPriceDisplay = freeAgentPriceDisplay + "<em>+ "+ formatCurrency(membershipFee) + " Membership Fee</em>";
			}
		}
		$("#reg-sg-price").html(freeAgentPriceDisplay);
		if (ppAvailableForFreeAgentReg) {
			$('#reg-sg-price').append('<em>Payment Plans Available</em>');
		}
	} else {
		$("#reg-sg").hide().addClass('reg-hidden');
	}
	
	if (showStaffReg == true) {
		var scope = $('#reglist').data('scope');
		var staffRoles = staffRegRoles.split(",");
		$('.reg-staff').remove(); // remove previously added roles
		$(staffRoles).each(function(idx, item){
			var role = item.split(":");
			var roleName = role[0];
			var rolePayment = role[1] == 'true';
			var roleId = role[2];
			
			if (eventRegStatusName == "SOLD_OUT" || eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_FREE_AGENTS" || eventRegStatusName == "ONLY_TEAM_PLAYERS_AND_FA" || eventRegStatusName == "CANCELED") {
				var staffRegUrl = '#';
			} else {
				if (showTeamCaptainReg == false && showDirectTeamPlayerReg == false && showFreeAgentReg == false && newRegFlow) {
					var staffRegUrl = '/registration/init?bid=' + baseEventId + '&type=Staff&programStaffId=' + roleId + "&redirectToStaffReg=true";
				} else {
					var staffRegUrl = '/registration?bid=' + baseEventId 
							+ (regUserId != null ? '&regUserId=' + regUserId : '') 
							+ (groupAccountId != null ? '&groupAccountId=' + groupAccountId : '') 
							+ '&type=Staff&programStaffId=' + roleId;
				}
			}

			var staffPriceDisplay = "";
			if (eventRegStatusName == "SOLD_OUT") {
				staffPriceDisplay = "Sold Out";
			} else if (eventRegStatusName == "ONLY_TEAM_CAPTAINS" || eventRegStatusName == "ONLY_TEAM_PLAYERS" || eventRegStatusName == "ONLY_FREE_AGENTS" || eventRegStatusName == "ONLY_TEAM_PLAYERS_AND_FA") {
				staffPriceDisplay = "Closed";
			} else if (eventRegStatusName == "CANCELED") {
				staffPriceDisplay = "Canceled";
			}
			
			var $roleRegEl = $('<li class="reg-staff">' +
									'<a href="' + staffRegUrl + '">' +
										'<img src="' + scope + '/_i/svg/staff.png" alt="' + roleName + ' image" />' +
										'<span class="reg-details">' +
											'<strong>' + roleName + '</strong>' + 
										'</span>' +
										'<span class="price">' + staffPriceDisplay 
										+ (rolePayment && ppAvailableForStaffReg ? '<em>Payment Plans Available</em>' : '') 
										+ '</span>' +
									'</a>' +
								'</li>');
			$("#reglist").append($roleRegEl);
		});
	} else {
		$(".reg-staff").hide().addClass('reg-hidden');
	}
	
	if (!showTeamCaptainReg && !showDirectTeamPlayerReg && !showFreeAgentReg && !showStaffReg && !showSmallGroupReg) {
		$("#no-reg-options-available").show();
	} else {
		$("#no-reg-options-available").hide();
	}
	
	if (sample == true) {
		$("#reglist").html('<span class="alert sample-program" style="font-size: 1.5em;"><strong>*Note:</strong> This is a sample program for demonstration purposes only.</span>');
	}
	
	cOverlay(".program-reg");

	// detect heigth of new reg roles format, and set each item to the max-height in the list
	var maxHeight = 0;
	$('#reglist li').each(function(){
		if ($(this).outerHeight() > maxHeight) {
			maxHeight = $(this).outerHeight();
		}
	}).height(maxHeight);

};

/* User Program Notices */
function toggleUserProgramNotices(el) {
	var programNameLink = $(el).parent().parent().parent().find(".program-name-link");
	var container = $(el).parent().parent().find(".user-program-notices");
	var notices = $(el).parent().find(".user-program-notices-list");
	$(container).find('#user-program-notices-program-name').html(programNameLink.text());
	$(container).find('#user-program-notices-content').html(notices.html());
	cOverlay(container);
}


function formatCurrency(num) {
    num = isNaN(num) || num === '' || num === null ? 0.00 : num;
	if(num == 0.00){
		return "Free";
	}
	else{
		return "$" + parseFloat(num).toFixed(2);
	}
}

/* Overlay */
function showPPInfo(id) {
	cOverlay("#" + id + "-pp-info");
}
function cOverlay(tgt, w) {
	renderOverlay(tgt, w, true);
};
function sOverlay(tgt, w) {
	renderOverlay(tgt, w, false);
};
function renderOverlay(tgt, w, centerOnScreen) {
	if (w === undefined) { w = 620; }
	$("body").append("<div id=\"cOverlay-shade\"></div>");
	$(tgt).wrap('<div class="cOverlay-wrap" role="dialog" aria-hidden="false"></div>');
	$(".cOverlay-wrap").css("width", w + "px");
	$(tgt).show();
	var overlay = $(tgt).parent();
	$(overlay).fadeIn(120);
	if (centerOnScreen == true) cOverlayPosition(overlay);
	$(window).bind("resize", function() { cOverlayPosition(overlay); });
};
function cOverlayPosition(tgt) {
	// Get x and y positions, also accounting for padding
	var padX = $(tgt).css("padding-left").replace(/[^\d\.]/g, '') * 1 + $(tgt).css("padding-right").replace(/[^\d\.]/g, '') * 1;
	var padY = $(tgt).css("padding-top").replace(/[^\d\.]/g, '') * 1 + $(tgt).css("padding-bottom").replace(/[^\d\.]/g, '') * 1;
	var posX = $(window).width()/2 - $(tgt).width()/2 - padX/2;
	var posY  = $(window).height()/2 - $(tgt).height()/2 - padY/2;

	// Fix infinite scrolling bug
	if ($(tgt).height() < $(window).height()) { posY += $(window).scrollTop(); }
	if ($(tgt).width() < $(window).width()) { posX += $(window).scrollLeft(); }

	// Set position
	$(tgt).css({position: "absolute", top: posY, left: posX});
};
function cOverlayClose(tgt) {
	$(tgt).parent().fadeOut(120, function() {
		$("#cOverlay-shade").fadeOut(210, function() {
			$(window).unbind("resize");
			$("#cOverlay-shade").remove();
			$(tgt).hide().unwrap();
		});
	});
};

/* Directions Form */
function showDirectionsForm(tgt) {
	$(tgt).find("form").slideDown("fast");
	$(tgt).find(".directions-btn").hide();
};

/* In-Site Admin Tools - Team Schedule Game Results */
function editGameScore(gameId) {
	var trigger = $(this);
	var parent = $('#edit-score-'+gameId);
	var options = parent.find('.options');
	
	var closeForm = function() {
		parent.hide();
		options.hide();
		parent.find("form input[type='text']").val('');
	}	
		
	parent.find("form .btn.save").unbind('click').click(function() {
		
		var gameState = parent.find("form li:nth-child(4) select").val();
		var onSuccess = function(parent, scores, status, msg) {
			loadScheduleView();
		};

		saveGameResults("/ajax/siteEditGameResult", '#edit-score-' + gameId, gameState, onSuccess); 
		closeForm();
		
	});
	
	parent.find("form .btn.alt").unbind('click').click(function() {
		closeForm();
		trigger.show();
	});

	options.show();
	parent.show();
}


/* ON READY EVENTS
------------------ */
$(function() {
	/* Main nav dropdowns */
	$("#nav .has-sub").hover(
		function() { $(this).find(".sub-nav").show(); },
		function() { $(this).find(".sub-nav").hide(); }
	);
	
	/* Autofill form fields */
	$(".autofill").each(function() {
		var label = $(this).attr("title");
		if(label!=undefined){
			$(this).parent().append("<label class=\"auto-label\">" + label + "</label>");
		}
		$(this).parent().find(".auto-label").click(function() {
			$(this).fadeOut(210);
			$(this).parent().find("input").focus();
		});
		
		if ( ($(this).val() == label) || ($(this).val() == "") ) {
			$(this).parent().find(".auto-label").fadeIn(120);
		}
		
		$(this).focus(function() {
			$(this).parent().find(".auto-label").fadeOut(210);
		});
		$(this).blur(function() {
			if ( ($(this).val() == label) || ($(this).val() == "") ) {
				$(this).val("");
				$(this).parent().find(".auto-label").fadeIn(120);
			}
		});
	});
	
    /* View Table Slideouts */
    $("table.view a.ai-user").click(function() {
        var tgt = $(this);
        
        if ( $(tgt).hasClass("active") ) {
            $(tgt).parent().parent().next().find(".details").slideUp("fast", function() {
                $(this)
                $(this).parent().parent().hide();
                $(this).parent().parent().prev().find(".ai-user").removeClass("active");
                $(tgt).parent().parent().next().next().find("span.marker").show();
            });
        } else {
            $(tgt).parent().parent().next().show().find(".details").slideDown("fast");
            $(tgt).addClass("active");
            $(tgt).parent().parent().next().next().find("span.marker").hide();
        }

        return false;
    });
    $("table.view .details a.view-toggle").click(function() {
        if ( $(this).attr("id") != "full-profile-link" ) {
                $(this).parent().slideUp("fast", function() {
                $(this).parent().parent().hide();
                $(this).parent().parent().prev().find(".ai-user").removeClass("active");
            });
            return false;
        }
    });
	
	/* Section nav current item marker */
	$(".aside-nav li.current a").prepend("<span class=\"current-marker\">&lsaquo; </span>");
	
	/* In-Site Admin Tools - Settings */
	$(".base-listing li, li.editable").hover(
		function() {
			if ($(this).find(".edit-score").length > 0) {
				$(this).find(".edit-score").show();
			}
		},
		function() {
			if ($(this).find(".edit-score").length > 0) {
				if (!$(this).find(".edit-score").hasClass("active")) {
					$(this).find(".edit-score").hide();
				}
			}
		}
	);
	
	/* Help Overlays */
	$(".help-overlay-trigger").click(function() {
		cOverlay($('body').find('#'+$(this).attr("overlay-id")));
	});
	
	// "Click Outside" events
	$("body").click(function() {
		$(".admin-options,.edit-score").each(function() {
			if ($(this).hasClass("active")) {
				$(this).removeClass("active").hide();
			}
		});
	});
	$(".admin-options,.edit-score").click(function(event){ event.stopPropagation(); });
});


/* Character counter (for text areas) */
function toCount(entrance,exit,text,characters) {
	var entranceObj=getObject(entrance);
	var exitObj=getObject(exit);
	var length=characters - entranceObj.value.length;
	if (length <= 0) {
		length=0;
		text='<span class="disable"> '+text+' </span>';
		entranceObj.value=entranceObj.value.substr(0,characters-1);
	}
	exitObj.innerHTML = text.replace("{CHAR}",length);
};










