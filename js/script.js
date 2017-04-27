
$(function(){
  // カウントダウン
  var count = Math.ceil( (new Date('2017/07/22') - new Date()) / (24*60*60*1000) );
  $('.countdown').html('あと ' + count + '日');

  $('form [name=name]').change(function() {
    var name = $(this).val();
    $('form [name=name]').each(function(i, input) {
      if (!input.val) $(input).val(name);
    });
  });
});

function submit_attend_form(form) {
  send_form($form);
  return false;
}

function submit_album_form(form) {
  var $form = $(form);
  var file_name = $('[type=file]', $form).prop('files')[0].name;
  $('[name=file_name]', $form).val(file_name);
  send_form($form);
  return true;
}

// フォーム送信
function send_form($form) {
  $.ajax({
    type: 'POST',
    url: 'https://script.google.com/macros/s/AKfycbzIIEPV_mv1Bk-jA12ZHXZk49T_-3_92YuMVbGBSVwl273pSlQ/exec',
    data: $form.serialize(),
    dataType: 'jsonp'
  }).done(function(res){
    console.log(res);
  });
}
