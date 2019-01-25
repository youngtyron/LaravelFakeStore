
function PutIntoBasket(){
  console.log('basket')
  var id = $('#product-id').attr('name');
  console.log(id)

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
      console.log('hello')
      console.log(response)
    },
    error: function(error){
      console.log('error')
    },
  });
}


$(document).on('click', '.buy-button', PutIntoBasket);
