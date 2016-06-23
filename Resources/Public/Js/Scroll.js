$(document).ready(function() {
    var table = $('#scrollable').DataTable( {
        scrollY:        "600px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false
    } );
 
    new $.fn.dataTable.FixedColumns( table, {
        leftColumns: 1,
        rightColumns: 0
    } );
} );