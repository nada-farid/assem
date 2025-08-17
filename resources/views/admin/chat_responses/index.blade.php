@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.chat-responses.create') }}">
               اضافة الردود الألية
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
       الردود الألية
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Banq">
                <thead>
            <tr>
                <th>#</th>
                <th>الكلمة المفتاحية</th>
                <th>الرد</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($responses as $response)
                <tr>
                    <td>{{ $response->id }}</td>
                    <td>{{ $response->keyword }}</td>
                    <td>{{ $response->response }}</td>
                    <td>
                        <a href="{{ route('admin.chat-responses.edit', $response->id) }}" class="btn btn-primary btn-sm">✏ تعديل</a>
                        <form action="{{ route('admin.chat-responses.destroy', $response->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')" class="btn btn-danger btn-sm">🗑 حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">لا توجد ردود مسجلة</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
</div>
@endsection