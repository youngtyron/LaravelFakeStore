function openCategoryNameEditor($this) {
  var namecell = $($this).parent().parent().find('.category-name');
  $(namecell).find('.category-name-p').css('display', 'none');
  $(namecell).find('form').css('display', 'block');
}

function ChangeOtherImagesInputProduct() {
  var input = document.getElementById('other-images-input');
  var files = input.files;
  var arr = new Array();
  for(var i=0;i<files.length;i++){
    arr.push(files[i]);
  }
  $(input).attr('value', arr);
}
