$(document).ready(function() {
    $("#livefilter-input").keyup(function(){
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val();
 
        // Loop through the comment list
        $("#grid-wrap tr").each(function(){
            
            // If the list item does not contain the text phrase fade it out
            if ($(this).find("td").eq(1).text().search(new RegExp(filter, "i")) < 0 && $(this).attr('class') != "header-row") {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
            }
        });
    });
});