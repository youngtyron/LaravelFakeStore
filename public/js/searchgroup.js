function SearchRequest(){
  var inputs = $('.form-check-input');
  var input_array = [];
  for (i=0; i<inputs.length; i++){
    if ($(inputs[i]).prop('checked')){
      input_array.push($(inputs[i]).val())
    }
  }
  console.log(input_array)
  var maxprice = $('.price-range').val();
  var url = '?brand=' + input_array + '?max=' + maxprice;
  window.location = url;
}

function MaxPriceIndicate(){
  $('.max-price').html($('.price-range').val());
}
