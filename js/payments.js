$(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
     $('#datatable tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
    
} );