var catalogelem = '<li class="list-group-item left-catalog-elem" id="in-work-li"></li>';
var categories = '';
var newcatalogblock = '<div class="left-catalog-box new-catalog-block"><ul class="list-group left-catalog-group"></ul></div>'


function LeftBlockRequest(){
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/leftblock/',
    success: function(response){
      categories = response;
      $.each(categories, function(){
        if (this.parent_id == 0){
          $('.left-catalog-group').append(catalogelem);
          $('#in-work-li').html(this.name);
          $('#in-work-li').attr('name', this.id);
          if (this.is_last!=0){
            $('#in-work-li').addClass('linker');
          }
          $('#in-work-li').removeAttr('id');
        }
      });
      $('.left-catalog-box').show();
    }
  });
};

function SubCatalogList(){
  var id = $(this).attr('name');
  var header = $(this).html();
  $('.left-catalog-elem').remove();
  $('.left-catalog-group').append(catalogelem);
  $('#in-work-li').addClass("left-catalog-header");
  $('#in-work-li').html(header);
  $('#in-work-li').removeAttr('id');
  $.each(categories, function(){
    if(this.id==id){
      console.log(this)
      var subcategories = this.children
      $.each(subcategories, function(){
        $('.left-catalog-group').append(catalogelem);
        $('#in-work-li').html(this.name);
        $('#in-work-li').attr('name', this.id);
        if (this.is_last!=0){
          $('#in-work-li').addClass('linker');
        }
        $('#in-work-li').removeAttr('id');
      });
    }
  });
  $(document).on('click', '.left-catalog-elem', SubCatalogList);
  $(document).on('click', '.linker', ProductHref);
};

function ProductHref(){
  var id = $(this).attr('name');
  window.location.href = 'http://localhost:8000/catalog/' + id + '/products';
}


$(document).on('click', '.left-catalog-elem', SubCatalogList);
$(document).on('click', '.linker', ProductHref);

$(document).ready(LeftBlockRequest);
