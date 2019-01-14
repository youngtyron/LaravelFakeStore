var new_table_row = "<tr class='categories-table-row' id='in-work-table-row'></tr>"
var table = $('.categories-box').find('.categories-table');

var categories = '';
$(document).ready(function() {
  $.ajax({
  type: 'GET',
  url: 'api_catalog/',
  success: function(response){
    categories = response.data;
    var counter = 4;
    $.each(categories, function(){
      if (counter <4){
        var tablerow  = $('#in-work-table-row');
        var cell = $('<td>', { class: 'categories-table-cell', id: 'in-work-table-cell', text: this.name}).appendTo(tablerow);
        cell.removeAttr("id");
        counter = counter + 1;
      }
      else{
        $('#in-work-table-row').removeAttr("id");
        $('.categories-table').append(new_table_row);
        var tablerow  = $('#in-work-table-row');
        var cell = $('<td>', { class: 'categories-table-cell', id: 'in-work-table-cell', text: this.name}).appendTo(tablerow);
        cell.removeAttr("id");
        counter = 1;
      }
    });
  },
  });
});
