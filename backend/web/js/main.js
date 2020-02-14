$(function(){
  //get the click of the create button
  $('#modalButton').click(function(){
    $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });
  //get login modal
  $('#modalLogin').click(function(){
    $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });

  //class for grid view button
  $('.activity-view-link').click(function(){
      $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });

  //class for grid update button
  $('.activity-update-link').click(function(){
      $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });

  $(".activity-delete-link").on("click", function() {
    $('#modaldelete').modal('show')
    .find('#modalContent')
    .load($(this).attr('value'));
    /*
      krajeeDialog.confirm("ต้องการลบข้อมูลใช่ไหม?", function (result) {
          if (result) {
              alert($(this).attr('value'));
              return true;
          } else {
            return false;
          }
      });*/
  });

});
