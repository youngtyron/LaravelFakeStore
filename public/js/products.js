var new_table_row = "<tr class='products-table-row' id='in-work-table-row'></tr>"
var table = $('.categories-box').find('.products-table');
var divbox = "<a class='product-link' href=''><div class='divbox' id='in-work-divbox'><p class='product-brand'></p><p class='product-model'></p></div></a>"
var image_elem="<div class='title-image-div'><p class='title-image-p'><img src='' class='title-image' alt='image' id='in-work-image'></p></div>"
var price = "<p id='in-work-price' class='product-price'></p>"
var products = '';
$(document).ready(function(){
  var id = parseInt($('#category-id').attr('name'));
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/products/',
    data: {'id':id},
    success: function(response){
      products = response;
      var counter = 4;
      $.each(products, function(){
        if (counter < 4){
          var tablerow  = $('#in-work-table-row');
          var cell = $('<td>', { class: 'products-table-cell', id: 'in-work-table-cell'}).appendTo(tablerow);
          cell.append(divbox);
          $('#in-work-divbox').find('.product-brand').html(this.brand);
          $('#in-work-divbox').find('.product-model').html(this.model);
          $('#in-work-divbox').append(image_elem);
          $('#in-work-divbox').parent().attr('href',  'http://localhost:8000/catalog/product/'+this.id);
          $('#in-work-image').attr('src', 'http://localhost:8000/storage/' + this.image);
          $('#in-work-divbox').append(price);
          $('#in-work-price').html(this.price + 'Р');
          $('#in-work-price').removeAttr("id");
          $('#in-work-image').removeAttr("id");
          $('#in-work-divbox').removeAttr("id");
          cell.removeAttr("id");
          counter = counter + 1;
        }
        else{
          $('#in-work-table-row').removeAttr("id");
          $('.products-table').append(new_table_row);
          var tablerow  = $('#in-work-table-row');
          var cell = $('<td>', { class: 'products-table-cell', id: 'in-work-table-cell'}).appendTo(tablerow);
          cell.append(divbox);
          $('#in-work-divbox').find('.product-brand').html(this.brand);
          $('#in-work-divbox').find('.product-model').html(this.model);
          $('#in-work-divbox').append(image_elem);
          $('#in-work-divbox').parent().attr('href',  'http://localhost:8000/catalog/product/'+this.id);
          $('#in-work-image').attr('src', 'http://localhost:8000/storage/' + this.image);
          $('#in-work-divbox').append(price);
          $('#in-work-price').html(this.price + 'Р');
          $('#in-work-price').removeAttr("id");
          $('#in-work-image').removeAttr("id");
          $('#in-work-divbox').removeAttr("id");
          cell.removeAttr("id");
          counter = 1;
        }
      });
    },
  });
})
