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

  //class for grid button
  $('.activity-view-link').click(function(){
      $('#modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
  });
});
