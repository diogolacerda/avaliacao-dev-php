$(document).ready(function() {

  hide_show_divs($('#type_id').val());

  $('#type_id').change(function(){
    hide_show_divs($(this).val());
  });
});

function hide_show_divs(type_div) {
  if(type_div == 1) {
    $('#book-div').show();
    $('#dictionary-div').hide();
  } else {
    $('#book-div').hide();
    $('#dictionary-div').show();
  }
}
