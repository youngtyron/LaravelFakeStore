function OpenChildCategories(){
  if ($(this).hasClass('linker')){
    var id = $(this).attr('name');
    window.location.href = 'http://localhost:8000/catalog/' + id + '/products';
  }
  else{
    var subcategories_div =$(this).next();
    $('.left-catalog-elem').hide();
    $(this).show();
    $('.active').hide();
    $(this).addClass('active');
    $(subcategories_div).children().show();
  }
}

function BackToCatalog(){
  $('.parent-catalog-li').show();
  $('.children-catalog-li').hide();
}

function GoToProducts(){
  var id = $(this).attr('name');
  window.location.href = 'http://localhost:8000/catalog/' + id + '/products';
}

$(document).on('click', '.left-catalog-elem', OpenChildCategories);

$(document).on('click', '.left-catalog-title', BackToCatalog)
