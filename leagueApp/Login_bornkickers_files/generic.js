function getQueryParameter(name) {
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(window.location.href);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function copyToClipboard(str) {
    var el = document.createElement('textarea');    // Create a <textarea> element
    el.value = str;                                 // Set its value to the string that you want copied
    el.setAttribute('readonly', '');                // Make it readonly to be tamper-proof
    el.style.position = 'absolute';
    el.style.left = '-9999px';                      // Move outside the screen to make it invisible
    document.body.appendChild(el);                  // Append the <textarea> element to the HTML document
    var selected =
        document.getSelection().rangeCount > 0      // Check if there is any content selected previously
            ? document.getSelection().getRangeAt(0) // Store selection if found
            : false;                                // Mark as false to know no selection existed before
    el.select();                                    // Select the <textarea> content
    document.execCommand('copy');                   // Copy - only works as a result of a user action (e.g. click events)
    document.body.removeChild(el);                  // Remove the <textarea> element
    if (selected) {                                 // If a selection existed before copying
        document.getSelection().removeAllRanges();  // Unselect everything on the HTML document
        document.getSelection().addRange(selected); // Restore the original selection
    }
}

function handleNumericInputs() {
	var $inputs = $("input[type='number']");
	$inputs.on('keydown', function (e) {
	    // Allow: backspace, delete, tab, escape, enter and .
	    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	         // Allow: Ctrl/cmd+A
	        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
	         // Allow: Ctrl/cmd+C
	        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
	         // Allow: Ctrl/cmd+X
	        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
	        // Allow: Ctrl/cmd+R
	        (e.keyCode == 82 && (e.ctrlKey === true || e.metaKey === true)) ||
	         // Allow: home, end, up, down, left, right
	        (e.keyCode >= 35 && e.keyCode <= 40)) {
	             // let it happen, don't do anything
	             return;
	    }
	    // Ensure that it is a number and stop the keypress
	    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	        e.preventDefault();
	    }
	});	
	$inputs.on('input', function (e) {
		if ($(e.target).val() < 0) {
			$(e.target).val(0);
			e.preventDefault();
			e.stopPropagation();
		}
	});	
}

$(function(){
	handleNumericInputs();	
});
