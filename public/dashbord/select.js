$(document).ready(function () {
  $('.select-all').click(function () {
    let $select2 = $('[data-plugin="customselect"]').select2();
    $select2.find('option').prop('selected', 'selected');
    $select2.trigger('change');
  })
  $('.deselect-all').click(function () {
    let $select2 = $('[data-plugin="customselect"]').select2();
    $select2.find('option').prop('selected', '');
    $select2.trigger('change');
  })

  $('[data-plugin="customselect"]').select2();
})