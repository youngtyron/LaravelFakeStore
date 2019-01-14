// $(document).on('click', '.edit-category-name', function(){
//
// });

function openCategoryNameEditor($this) {
  // var namecell = $('.category-name').find('[name=$id]');
  var namecell = $($this).parent().parent().find('.category-name');
  $(namecell).find('.category-name-p').css('display', 'none');
  $(namecell).find('form').css('display', 'block');
  console.log(namecell)
}
