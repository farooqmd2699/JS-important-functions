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
