jQuery(document).ready(function() {
    $("#myTable").tablesorter({
        debug: false,
        widgets: ['zebra'],
        sortList: [[0, 0]]
    }).tablesorterFilter({
        filterContainer: $("#filter-box"),
        filterClearContainer: $("#filter-clear-button"),
        filterColumns: [0],
        filterCaseSensitive: false,
        callback: function() {
            var rowCount = $("#myTable tr:visible").length - 1;
           // alert(rowCount);
        }
    });
    
    $("#check-box, #check-box2").click(function(){
      // alert($(this).is(":checked"));
      
     // If both the checkboxes are selected or not selected.  
    if (($("#check-box").is(":checked") && $("#check-box2").is(":checked")) || (!$("#check-box").is(":checked") && !$("#check-box2").is(":checked")) ) {
        
            showAllRow();
        
        } else if ($("#check-box").is(":checked")  ) {
           filterRow($("#check-box").val());
        } else if ($("#check-box2").is(":checked") ){
           filterRow($("#check-box2").val());
        }
        
    });
    
    
    
});

function showAllRow() {
    
    $("#myTable").find("tr").each(function(){
               $(this).show();
    });

}


function filterRow(chckBoxValue) {
    
    $("#myTable").find("tr").each(function(){
    
    var bool = 0; // Identifies if the rows td has that filter or not.
        
        $(this).find("td").each(function(){
            if($(this).text() != chckBoxValue) {
                bool = 1;
            } else { 
                bool = 0;
                return false;
            }
        });
        
        if (bool == 1) {
               $(this).hide();
        }else{
               $(this).show();
        }
    });

}