@extends('layouts.center')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.course.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Course">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.course.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.title') }}
                    </th>
                      <th>
                        {{ trans('cruds.course.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.short_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.start_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.course.fields.end_at') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('course_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.courses.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('center.courses.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'category_title', name: 'category.title' },
{ data: 'title', name: 'title' },
{ data: 'status', name: 'status' },
{ data: 'short_description', name: 'short_description' },
{ data: 'type', name: 'type' },
{ data: 'start_at', name: 'start_at' },
{ data: 'end_at', name: 'end_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Course').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection