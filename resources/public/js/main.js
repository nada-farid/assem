$(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })

  $('.date').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.timepicker').datetimepicker({
    format: 'HH:mm:ss',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })

  $('.c-header-toggler.mfs-3.d-md-down-none').click(function (e) {
    $('#sidebar').toggleClass('c-sidebar-lg-show');

    setTimeout(function () {
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    }, 400);
  });

})
function changeStatus() {
  document.querySelectorAll('.change-approved').forEach(function (label) {
    label.addEventListener('click', function () {
      const checkbox = label.previousElementSibling;
      checkbox.checked = !checkbox.checked;
      let table = $(this).attr('table');
      let route = $(this).attr('route');
      saveChange(route, table)
    });
  });
}

function saveChange(route, table) {
  var token = $("meta[name='csrf-token']").attr("content");
  var Table = $("#" + table).DataTable();
  $.ajax({
    url: route,
    dataType: 'json',
    method: "POST",
    data: {
      "_token": token,
    },
    success: function (data) {
      Swal.fire({
        title: data.name,
        html: '<p>' + data.success + '</p>',
        icon: 'success',
        type: "success",
      });
      // to know if table is server-side dataTable
      if (Table.settings()[0].oFeatures.bServerSide) {
        Table.ajax.reload();
      }
    },
  });
}