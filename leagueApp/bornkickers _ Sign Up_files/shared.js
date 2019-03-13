/* Practice Drills Toggle */
function togglePracticeDrills() {
  var origHeight = $('#drillHelpSlide').data('origHeight');
    
    if (origHeight) {
        $('#drillHelpSlide').removeData('origHeight');
        $('#drillHelpSlide').animate({height: origHeight});
        $(".arrow").addClass("minimized");
    } else {
        origHeight = $('#drillHelpSlide').height();
        $('#drillHelpSlide').data('origHeight', origHeight);
        $('#drillHelpSlide').animate({height: origHeight * 0.2});
        $(".arrow").removeClass("minimized");
    }    
};

$('#drillHelpSlide').click(togglePracticeDrills);


/* Quit Practice Drills */
function quitPracticeDrills() {
	$('#drillHelpSlide').animate({height: 10});
	$("#drills-navigator-wrap").fadeOut("slow");
}

/* System Messages */
function showSysMessages(dur, persist) {
	if (dur === undefined) {
		dur = -1;
	} else {
		dur *= 1000;
	}
	
	$("#sys-messages-hide p").each(function() {
		var tgt = $(this);
		
		$(tgt).prepend("<a class=\"close\"></a>");
		$(tgt).find("a").click(function() {
			$(tgt).stop();
			hideSysMessage(tgt);
		});
		
		if(persist){
			if($(tgt).hasClass('sys-confirm')){
				$(tgt).animate({opacity:1}, dur, function() {
					hideSysMessage(tgt);
				});
			}
		}else{
			$(tgt).animate({opacity:1}, dur, function() {
				hideSysMessage(tgt);
			});
		}
		
	});
	
	$("#sys-messages-hide").show(210);
};
function hideSysMessage(t) {
	$(t).fadeOut(210, function() {
		$(this).remove();
	});
	setTimeout(function(){
		$("#sys-messages-hide").fadeOut(210).remove();
	}, 200);
};


function smoothScroll(t) {
	var targetOffset = jQuery(t).offset().top;
	jQuery('html,body').animate({scrollTop: targetOffset}, 420);
	return false;
};

//FACEBOOK, yay!
/*
 * 
 *  if 'fbAssociate' == true, 'lookUpFBUser' routine will attempt to associate FB user id with UserSite record
 *  currently this is only set to true on the FB settings config page per user for scenario of connecting to FB post sign-up
 *  
 *  functions 'fbLookupFailure' and 'fbLookupSuccess' will have varying behavior and thus need to be implemented in relying jsps
 */
function handleFBLogin(fbAssociate){
	console.log("...handleFBLogin HIT");
	FB.getLoginStatus(function(response) {
	   if (response.authResponse) {
	   		//alert("FB user session found...uid: " + response.authResponse.userID + " token: " + response.authResponse.accessToken);
			//here we want to first see if user already has a) USER account in ORG_ACCOUNT and/or b) FB associated to current SITE
			  
			var fbUserResp = lookUpFBUser(response.authResponse.userID, response.authResponse.accessToken, fbAssociate);
			  
		    if(fbUserResp == 'error' || fbUserResp == 'notfound'){
		    	fbLookupFailure();
			}
			else if(fbUserResp == 'success'){
				fbLookupSuccess();
			}


	   } else {
	        // no user session available, someone you dont know
	        //alert("FB user session NOT found...");
	   }
   });

}

function lookUpFBUser(fbuidVal, fbAccessTokenVal, fbAssociateVal){
	var params = {fbuid:fbuidVal, fbat:fbAccessTokenVal, fbAssociate:fbAssociateVal};
	var res = $.ajax({
		type: "POST",
		url: "/ajax/lookUpByFBID",
		data: params,
		success: function(result) {
			res = result;
		},
		error: function(request,error,errObj) {
			alert('error: ' + error + " errObj: " + errObj);
		},
		async: false 
	}).responseText;

	return res;
}
	        

function handleFBLoginOnConsole(){
	FB.getLoginStatus(function(response) {
	   if (response.authResponse) {
			var fbUserResp = lookUpFBUser(response.authResponse.userID, response.authResponse.accessToken, false);
			fbLookupSuccess(response.authResponse.userID);
	   } else {
	        // no user session available, someone you dont know
		   fbLookupFailure();
	   }
   });

}

function removeFBTokenFromSession(){
	$.post("/ajax/removeFBToken",{},function(data){});	
}

// Printable Stuff

function memberCardConfirmationOverlay(userId, programId) {
	if (confirm('Generate/Download Member Card?')) {
		window.location = '/printable?format=PDF&type=MEMBER_CARD&issuedByRole=Captain&userId=' + userId + '&programId=' + programId;
	}
}

function memberCardOptionsOverlay(userId, programId) {
	$.ajax({
		type: "POST",
		url: "/ajax/memberCardOptions",
		data: { "userId": userId, "programId": programId },
		cache: false,
		success: function(content) {
			//XXX: this probably shouldn't be commented out, but on success it causes the
			//     message box to show as blank.
			//showSystemMessages(content, 5);
			var status = $("#status").val();
			if (status != 'error') {
				var overlayEl = $(content);
				overlayEl.dialog({
					modal: true,
					width: '450px'
				});
				
				// IMPORTANT: need to unbind previously mapped (if any) 'click' event to ensure only single AJAX call will be made upon button click
				$("#member-card-overlay .overlay-btn.main").unbind('click');
				$("#member-card-overlay .overlay-btn.alt").unbind('click');

				$("#member-card-overlay .overlay-btn.main").click(function() {
					overlayEl.dialog("close");
					programId = overlayEl.find("#member-card-program-team").val();
					window.location = '/printable?format=PDF&type=MEMBER_CARD&issuedByRole=Admin&userId=' + userId + '&programId=' + programId;
				});
				$("#member-card-overlay .overlay-btn.alt").click(function() {
					overlayEl.dialog("close");
				});
			}
		},
		error: function(request, textStatus, errorThrown) {
			showErrorMessage(errorThrown);
		}
	});
};

function teamMemberCardsOptionsOverlay(teamId, programId, issuedByRole) {
	$.ajax({
		type: "POST",
		url: "/ajax/teamMemberCardsOptions",
		data: { "teamId": teamId, "programId": programId },
		cache: false,
		success: function(content) {
			showSystemMessages(content, 5);
			var status = $("#status").val();
			if (status != 'error') {
				var overlayEl = $(content);
				overlayEl.dialog({
					modal: true,
					width: '450px'
				});
				
				// IMPORTANT: need to unbind previously mapped (if any) 'click' event to ensure only single AJAX call will be made upon button click
				$("#team-member-cards-overlay .overlay-btn.main").unbind('click');
				$("#team-member-cards-overlay .overlay-btn.alt").unbind('click');

				$("#team-member-cards-overlay .overlay-btn.main").click(function() {
					var targetUrl = '/printable?format=PDF&type=TEAM_MEMBER_CARDS&issuedByRole=' + issuedByRole + '&teamId=' + teamId + '&programId=' + programId;
					var memberSelected = false;
					overlayEl.find("input[type=checkbox]").each(function(i, cb) {
						if ($(cb).is(":checked")) {
							memberSelected = true;
							targetUrl += '&userIds=' + $(cb).attr("value");
						}
					});
					if (!memberSelected) {
						showErrorMessage("Please, choose at least one team member to proceed", 3);
					} else {
						overlayEl.dialog("close");
						window.location = targetUrl;
					}
				});
				$("#team-member-cards-overlay .overlay-btn.alt").click(function() {
					overlayEl.dialog("close");
				});
			}
		},
		error: function(request, textStatus, errorThrown) {
			showErrorMessage(errorThrown);
		}
	});
}

function printableTeamRosterConfirmationOverlay(teamId, programId, issuedByRole) {
	if (confirm('Generate/Download Printable Team Roster?')) {
		window.location = '/printable?format=PDF&type=TEAM_ROSTER&issuedByRole=' + issuedByRole + '&teamId=' + teamId + '&programId=' + programId;
	}
}

function htmlPrintableTeamRosterConfirmationOverlay(teamId, programId, issuedByRole) {
	var url = '/printable?format=HTML&type=TEAM_ROSTER&issuedByRole=' + issuedByRole + '&teamId=' + teamId + '&programId=' + programId;
	window.open(url, '_blank');
}

function htmlPrintableMultiTeamRosterConfirmationOverlay(programId, issuedByRole) {
	var url = '/printable/multiteam?format=HTML&type=MULTI_TEAM_ROSTER&issuedByRole=' + issuedByRole + '&programId=' + programId;
	window.open(url, '_blank');
}

// Conversions & Formatting

function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function handleCountryLabelOverrides(country, stateLabel, postLabel){
	if(country != 'US'){
		$('#countryCode').val(country);
		$('#stateLabel').html(stateLabel);
		$('#stateLabelShip').html(stateLabel);
		$('#zipLabel').html(postLabel);
		$('#zipLabelShip').html(postLabel);
	}	
}

function orderRemovalConf(invoiceId, poid, name){
	$("#delete-po-inv").html(invoiceId);
	$("#delete-po-poid").html(poid);
	$("#delete-po-itemName").html(name);
	cOverlay('#delete-po', 348);
}


function handleProductOrderRemoval(){
	var invoiceId = $("#delete-po-inv").text();
	var poid = $("#delete-po-poid").text();
	var dataStr = "invoiceId="+invoiceId+"&epoId="+poid;
	$("#delete-po-btn").hide();
	$("#delete-po-btn-no").hide();
	$("#delete-po-loader").show();
	$.ajax({
		type: "POST",
		url: "/ajax/deleteProductOrder",
		data: dataStr,
		cache: false,
		success: function(msg) {
			if(msg == 'success'){
				window.location = window.location + "&prodDel=true";
			}
		},
		error: function(request, textStatus, errorThrown) {}
	});
}

// Validation

function isInteger(strValue) {
	var intRegExp  = /(^-?\d\d*$)/;  
	return intRegExp.test(strValue);
}

// Keys

function setKeyHandler(keyCode, oneTime, handler) {
    window.onkeyup = function(e){
        var key = e.keyCode ? e.keyCode : e.which;
        if (key == keyCode) {
            handler();
            if (oneTime) {
            	window.onkeyup = undefined;
			}
        }
    };
}

function setOneTimeEscKeyHandler(handler) {
    setKeyHandler(27, true, handler);
}

function setOneTimeEnterKeyHandler(handler) {
    setKeyHandler(13, true, handler);
}
