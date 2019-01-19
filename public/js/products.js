var new_table_row = "<tr class='products-table-row' id='in-work-table-row'></tr>"
var table = $('.categories-box').find('.products-table');
var products = '';
$(document).ready(function(){
  var id = parseInt($('#category-id').attr('name'));
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/products/',
    data: {'id':id},
    success: function(response){
      console.log(response.data)
      products = response.data;
      var counter = 4;
      $.each(products, function(){
        console.log(this)
        if (counter < 4){
          var tablerow  = $('#in-work-table-row');
          var cell = $('<td>', { class: 'products-table-cell', id: 'in-work-table-cell', text: this.model}).appendTo(tablerow);
          cell.removeAttr("id");
          counter = counter + 1;
        }
        else{
          $('#in-work-table-row').removeAttr("id");
          $('.products-table').append(new_table_row);
          var tablerow  = $('#in-work-table-row');
          var cell = $('<td>', { class: 'products-table-cell', id: 'in-work-table-cell', text: this.model}).appendTo(tablerow);
          cell.removeAttr("id");
          counter = 1;
        }
      });
    },
  });
})
