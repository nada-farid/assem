@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">👀 عرض الرد</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">الكلمة المفتاحية:</h5>
            <p class="card-text">{{ $response->keyword }}</p>

            <h5 class="card-title">الرد:</h5>
            <p class="card-text">{{ $response->response }}</p>
        </div>
    </div>

    <a href="{{ route('admin.chat-responses.index') }}" class="btn btn-secondary mt-3">⬅ رجوع</a>
</div>
@endsection