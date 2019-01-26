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
      x = 2;
      console.log('hello')
      console.log(response)
    },
    error: function(error){
      console.log('error')
      console.log(error.responseJSON.message)
    },
  });
  // return false;
}


$(document).on('click', '.buy-button', PutIntoBasket);
