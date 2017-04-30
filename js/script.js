
$(function(){
  // カウントダウン
  var count = Math.ceil( (new Date('2017/07/22') - new Date()) / (24*60*60*1000) );
  $('.countdown').html('あと ' + count + '日');

  $('form [name=email]').change(function() {
    var name = $(this).val();
    $('form [name=email]').each(function(i, input) {
      if (!input.val) $(input).val(name);
    });
  });

  var hash = location.hash;
  if (hash.indexOf('upload_photo') > 0) {
    if (hash.indexOf('success') > 0) {
      show_success($('#album_form form'));
    } else {
      show_fail($('#album_form form'));
    }
    location.hash = 'album_form';
  }
});

function submit_attend_form(form) {
  var $form = $(form);
  if ($('[name=email]', $form).val() && $('[name=address]', $form).val()) {
    send_form($form);
  }
  return false;
}

function submit_album_form(form) {
  var $form = $('#album_form form');
  var file = $('[type=file]', $form).prop('files')[0];
  if (file) {
    $('[name=file_name]', $form).val(file.name);
  }
  if ($('[name=email]', $form).val() && $('[name=file_name]', $form).val()) {
    $('.loading', $form).removeClass('hidden');
    send_form($form);
    return true;
  } else {
    return false;
  }
}

// フォーム送信
function send_form($form) {
  $('.alert', $form).hide();
  $('.loading', $form).removeClass('hidden');
  return $.ajax({
    type: 'POST',
    url: 'https://script.google.com/macros/s/AKfycbzIIEPV_mv1Bk-jA12ZHXZk49T_-3_92YuMVbGBSVwl273pSlQ/exec',
    data: $form.serialize(),
    dataType: 'jsonp'
  }).done(function(res) {
    show_success($form);
  }).fail(function(e) {
    show_fail($form);
  }).always(function(xhr, st) {
    refresh_form($form);
    $('.loading', $form).addClass('hidden');
  });
}

function refresh_form($form) {
  $('.j_input', $form).val('');
}

function show_success($form) {
  $('.alert', $form).hide();
  $('.success.alert', $form).show();
}

function show_fail($form) {
  $('.alert', $form).hide();
  $('.fail.alert', $form).show();
}
