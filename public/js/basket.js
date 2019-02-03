function darkIt(){
  $(this).css('opacity', 1);
};

function lightIt(){
  $(this).css('opacity', 0.4);
};

function deleteFormBasket(){
  if (confirm ('Удалить товар из корзины?')){
    var id = $(this).attr('name');
    $(this).parent().parent().attr('id', 'in_delete-process');
    console.log('delete')
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'DELETE',
      data: {'id': id},
      url: 'http://localhost:8000/api/delete_from_basket/',
      success: function(response){
        console.log(response)
        $('#in_delete-process').remove();
      },
      error: function(error){
        console.log(error)
      },
    });
  }
}

$(document).on('mouseover', '.delete-from-basket', darkIt);
$(document).on('mouseout', '.delete-from-basket', lightIt);
$(document).on('click', '.delete-from-basket', deleteFormBasket);
