function PutIntoBasket(){
  var id = $('#product-id').attr('name');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: 'POST',
    url: 'http://localhost:8000/api/to_basket/',
    data: {'id':id},
    success: function(response){
      if (response.writeTovar==1){
        $('.rightblock-basket-counter').html(String(response.num) + ' товар в корзине')
      }
      else  if (response.writeTovar==2){
        $('.rightblock-basket-counter').html(String(response.num) + ' товара в корзине')
      }
      else {
        $('.rightblock-basket-counter').html(String(response.num) + ' товаров в корзине')
      }
      alert('Товар добавлен в корзину');
    },
  });
  // return false;
}

$(document).on('click', '.buy-button', PutIntoBasket);
