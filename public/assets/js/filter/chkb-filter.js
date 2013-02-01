$(document).ready(function() {
    $('input[type="checkbox"]').change(function() {
        $("#grid-wrap tr").each(function(){
            $(this).show();
        });

        if ($('input[type="checkbox"]:checked').length > 0) {
            //$('#grid-wrap >tr').hide();
            
            $('input[type="checkbox"]:checked').each(function() {
                var check_id = $(this).attr('id');

                $("#grid-wrap tr").each(function(){
            
                    // If the list item does not contain the text phrase fade it out
                    if ($(this).find("td").eq(2).text().search(new RegExp(check_id, "i")) < 0 && $(this).attr('class') != "header-row") {
                        $(this).hide();

                    // Show the list item if the phrase matches and increase the count by 1
                    } else {
                        $(this).show();
                    }
                });
            });
        }/* else {
            $("#grid-wrap tr").each(function(){
                $(this).show();
            });
        }*/
    });
});