<div class="card">
    <div class="card-header">
        {{ trans('cruds.courseStudent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-courseCourseStudents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.identity_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.registered') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.certificate') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.relevance') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.attend_course') }}
                        </th>
                        <th> 
                            الدورات السابقة
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.transportaion') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.prev_exper') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.address') }}
                        </th>
                        <th>
                            الحضور
                        </th>
                        <th>
                            الشهادة
                        </th>
                        <th>
                            رابط الشهادة
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseStudents as $key => $courseStudent)
                        <tr data-entry-id="{{ $courseStudent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $courseStudent->id ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->name ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->email ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->identity_num ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CourseStudent::REGISTERED_RADIO[$courseStudent->registered] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CourseStudent::CERTIFICATE_RADIO[$courseStudent->certificate] ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->description ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->relevance ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->attend_course ?? '' }}
                            </td>
                            <td> 
                                @if($courseStudent->courses_before)
                                    @foreach(json_decode($courseStudent->courses_before,true) as $raw)
                                        {{ $raw['course_name'] }} ,
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $courseStudent->transportaion ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->prev_exper ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->address ?? '' }}
                            </td>
                            <td>
                                @foreach ($courseStudent->attendance as $raw)
                                    {{ $raw->date }}
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                @if ($courseStudent->request_certificate)
                                    تم الطلب
                                    <br>
                                    {{ $courseStudent->email_certificate }}
                                @else
                                    لم يتم الطلب
                                @endif
                            </td>
                            <td>
                                {{ asset(str_replace('public', 'storage', certificate_store($courseStudent->id))) }}
                            </td>
                            <td>
                                @can('course_student_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('admin.course-students.show', $courseStudent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('course_student_edit')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('admin.course-students.edit', $courseStudent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('course_student_delete')
                                    <form action="{{ route('admin.course-students.destroy', $courseStudent->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                                <a class="btn btn-xs btn-warning"
                                    href="{{ route('admin.courses.get_certificate', $courseStudent->id) }}">
                                    طباعة الشهادة
                                </a>
                                @if ($courseStudent->request_certificate)
                                    <a class="btn btn-xs btn-success"
                                        href="{{ route('admin.courses.send_certificate', $courseStudent->id) }}">
                                        ارسال الشهادة بالأيميل
                                    </a>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('course_student_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.course-students.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-courseCourseStudents:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
