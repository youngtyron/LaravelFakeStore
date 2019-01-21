var new_table_row = "<tr class='products-table-row' id='in-work-table-row'></tr>"
var table = $('.categories-box').find('.products-table');
var divbox = "<a class='product-link' href=''><div class='divbox' id='in-work-divbox'><p class='product-brand'></p><p class='product-model'></p></div></a>"
var image_elem="<div class='title-image-div'><p class='title-image-p'><img src='' class='title-image' alt='image' id='in-work-image'></p></div>"
var price = "<p id='in-work-price' class='product-price'></p>"
var products = '';
var array = [];

function ProductsRequest() {
    var id = parseInt($('#category-id').attr('name'));
    var lastprice = $('.product-price').last().attr('name');
    $.ajax({
      type: 'GET',
      url: 'http://localhost:8000/api/products/',
      data: {'id':id, 'price': lastprice},
      success: function(response){
        products = response;
        if (products != ''){
          if ($('.products-table-row').last().find('.divbox').length ==0){
            var counter = 3;
          }
          else{
            var counter = $('.products-table-row').last().find('.divbox').length;
          }
          for (var i=0; i<products.length; i++) {
            product = products[i];
            if ($.inArray(product.id, array)==-1){
              array.push(product.id);
              if (counter < 3){
                var tablerow  = $('#in-work-table-row');
                var cell = $('<td>', { class: 'products-table-cell', id: 'in-work-table-cell'}).appendTo(tablerow);
                cell.append(divbox);
                $('#in-work-divbox').find('.product-brand').html(product.brand);
                $('#in-work-divbox').find('.product-model').html(product.model);
                $('#in-work-divbox').append(image_elem);
                $('#in-work-divbox').parent().attr('href',  'http://localhost:8000/catalog/product/'+product.id);
                $('#in-work-image').attr('src', 'http://localhost:8000/storage/' + product.image);
                $('#in-work-divbox').append(price);
                $('#in-work-price').html(product.price + 'Р');
                $('#in-work-price').attr('name', product.price);
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
                $('#in-work-divbox').find('.product-brand').html(product.brand);
                $('#in-work-divbox').find('.product-model').html(product.model);
                $('#in-work-divbox').append(image_elem);
                $('#in-work-divbox').parent().attr('href',  'http://localhost:8000/catalog/product/'+product.id);
                $('#in-work-image').attr('src', 'http://localhost:8000/storage/' + product.image);
                $('#in-work-divbox').append(price);
                $('#in-work-price').html(product.price + 'Р');
                $('#in-work-price').attr('name', product.price);
                $('#in-work-price').removeAttr("id");
                $('#in-work-image').removeAttr("id");
                $('#in-work-divbox').removeAttr("id");
                cell.removeAttr("id");
                counter = 1;
              };
            };
          };
        }
        else{
          if ($('.divbox').length == 0){
            $('.no-products').show();
          }
        }
      },
    });
}

$(document).ready(ProductsRequest);


$(document).on('scroll', window, function(){
  if (jQuery(window).scrollTop()+jQuery(window).height()>=jQuery(document).height()){
    $(document).ready(ProductsRequest);
  }
});
