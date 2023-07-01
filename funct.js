//ToTrimANumber in input
 function trimNumber(el) {
        el.value = el.value.
        replace(/^0+|[^0-9 ]/ig, "").
        replace(/(^\s*)|(\s*$)/gi, ""). // removes leading and trailing spaces
        replace (/[ ]{1,}/gi,"").       // replaces multiple spaces with no space 
        replace(/\n +/, "\n"); // Removes spaces after newlines
        return;
  }




  

  
//ToTrimAlphabets
    function trimAlpha(el) {
        el.value = el.value.
        replace(/[^A-Z ]/ig, "").
        replace(/(^\s*)|(\s*$)/gi, ""). // removes leading and trailing spaces
        replace (/[ ]{2,}/gi," ").       // replaces multiple spaces with one space 
        replace(/\n +/, "\n"); // Removes spaces after newlines
        return;
    }

//to take input phone number only numbers will not accept 0

 jQuery(document).ready(function () {
      jQuery("#input-custom-field4").keypress(function (e) {
         var length = jQuery(this).val().length;
       if(length > 9) {
            return false;
       } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
       } else if((length == 0) && (e.which == 48)) {
            return false;
       }
      });
    });


///
                  
                   
			
