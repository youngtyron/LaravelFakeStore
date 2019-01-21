function SwitchCatalogList(){
  if ($('.left-catalog-elem').css('display') == 'none'){
    $('.left-catalog-elem').show();
  }
  else{
    $('.left-catalog-elem').hide();
  }
};

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
        $('.left-catalog-group').append(catalogelem);
        $('#in-work-li').html(this.name);
        $('#in-work-li').attr('name', this.id);
        if (this.children.length==0){
          $('#in-work-li').addClass('linker');
        }
        $('#in-work-li').removeAttr('id');
      });
    }
  });
};

function SubCatalogList(){
  var id = $(this).attr('name');
  if ($(this).hasClass('linker')){
    window.location.href = 'http://localhost:8000/catalog/' + id + '/products';
  }
  else{
    if ($('.new-catalog-block').length==0){
      $(this).append("<i class='fas fa-angle-right'></i>")
      $('.leftpanel').append(newcatalogblock);
      var left = parseInt($('.left-catalog-box').first().css('left'));
      var width = parseInt($('.left-catalog-box').first().css('width'));
      var distance = left + width;
      $('.new-catalog-block').css('left', distance);
      $.each(categories, function(){
        if(this.id==id){
          var subcategories = this.children;
          $.each(subcategories, function(){
            $('.new-catalog-block').find('ul').append(catalogelem);
            $('#in-work-li').html(this.name);
            $('#in-work-li').attr('name', this.id);
            $('#in-work-li').removeAttr('id');
          });
          $('.new-catalog-block').find('li').show();
        }
      });
    }
    else{
      $('.new-catalog-block').remove();
      $('.fa-angle-right').remove();
      $(this).append("<i class='fas fa-angle-right'></i>")
      $('.leftpanel').append(newcatalogblock);
      var left = parseInt($('.left-catalog-box').first().css('left'));
      var width = parseInt($('.left-catalog-box').first().css('width'));
      var distance = left + width;
      $('.new-catalog-block').css('left', distance);
      $.each(categories, function(){
        if(this.id==id){
          var subcategories = this.children;
          $.each(subcategories, function(){
            $('.new-catalog-block').find('ul').append(catalogelem);
            $('#in-work-li').html(this.name);
            $('#in-work-li').attr('name', this.id);
            $('#in-work-li').removeAttr('id');
          });
          $('.new-catalog-block').find('li').show();
        }
      });
    }
    $(document).on('click', '.left-catalog-elem', SubCatalogList);
  }
};

$(document).on('click', '.left-catalog-elem', SubCatalogList);
$(document).ready(LeftBlockRequest);
