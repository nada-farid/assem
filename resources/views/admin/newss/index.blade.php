@extends('layouts.admin')
@section('content')
@can('news_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.newss.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.news.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.news.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-News">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.news.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.inside_image') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.views') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.video_url') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.background_image') }}
                    </th>
                    <th>
                        {{ trans('cruds.news.fields.date') }}
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
@can('news_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.newss.massDestroy') }}",
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
    ajax: "{{ route('admin.newss.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'title', name: 'title' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'inside_image', name: 'inside_image', sortable: false, searchable: false },
{ data: 'views', name: 'views' },
{ data: 'video_url', name: 'video_url' },
{ data: 'background_image', name: 'background_image', sortable: false, searchable: false },
{ data: 'date', name: 'date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-News').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection