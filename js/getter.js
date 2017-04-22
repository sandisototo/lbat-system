$(document).ready(function () {

  var $target = '';
  if ($target != 'all') {
    $('.table tr').css('display', 'none');
    $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
  } else {
    $('.table tr').css('display', 'none').fadeIn('slow');
  }

    $('.selected-row').click(function() { //Once any element with class "table_row" is clicked
        $('.selected-row').removeClass('selected'); // "Unselect" all the rows
        $(this).addClass('selected'); // Select the one clicked
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
