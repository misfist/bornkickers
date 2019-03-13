
//This .js module should ONLY contain function definitions 
//for FB related routines that need to be executed within scope of window.fbAsyncInit 
//The primary example of why this is needed is to support calling FB.getLoginStatus with varying behavior
//These are dynamically executed within public site decorator (and can be moved to console if needed)
//by seeing if Action property 'fbinit' is defined
//The relying parent Action is declared before each function below for clarity



//com.sportsvite.league.web.action.site.SiteLoginAction
function handleWidgetFBLogin(){
	FB.login(function(response) {
		if (response.authResponse) {
			handleFBLogin('false');
  	    } else {
  	    	//alert('Facebook log-in failed');
  	    }
  	 }, {scope: 'email'});
     
}


//com.sportsvite.league.web.action.site.teams.TeamHomeAction
//com.sportsvite.league.web.action.site.programs.home.BaseEventHomeAction|LeagueHomeAction
//com.sportsvite.league.web.action.site.RegistrationConfirmationAction
function getFBLoginStatusForPublicSite(isLoggedIn){
	if(window.showFBButton && window.hideFBButton){
		if(isLoggedIn){
		   FB.getLoginStatus(function(response) {
			   if (response.authResponse) {  			
				   if(response.status === 'not_authorized') {
					   //need to still present user with FB button to get authorization
					   showFBButton();
				   }
				   else{
					   var fbUserResp = lookUpFBUser(response.authResponse.userID, response.authResponse.accessToken, false);
					   if(fbUserResp == 'notfound'){
					      showFBButton();   
					   }
					   else{						  
						   hideFBButton();   
					   }
					}
								  
				} else {
					showFBButton();
					removeFBTokenFromSession();
				}
		   });
		}
	}
	else{
		setTimeout(function(){getFBLoginStatusForPublicSite(isLoggedIn)}, 50);
	}
}


function fbEnsureInit(callback) {
    if(!window.fbApiInit) {
        setTimeout(function() {fbEnsureInit(callback);}, 50);
    } else {
        if(callback) {
            callback();
        }
    }
}



function convertToArray(nodes){
	var array = null;
	try{
	   array = Array.prototype.slice.call(nodes,0);	
	}
	catch (ex){
		array = new Array();
		for(var i=0, len=nodes.length; i < len; i++){
		   array.push(nodes[i]);
		}
	}
	return array;
}

function executeFBInitFunction(functionName, context, isLoggedIn /*, args */) {
	//console.log(arguments.length);
	//console.log(arguments.callee);
	//var args = Array.prototype.slice.call(arguments).splice(2); //Won't work in wonderful IE8/7
	var args = new Array();
	args.push(isLoggedIn);
	
	var namespaces = functionName.split(".");
	var func = namespaces.pop();
	for(var i = 0; i < namespaces.length; i++) {
	   context = context[namespaces[i]];
	}
	return context[func].apply(this, args);
}

