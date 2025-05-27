@extends('associations.layout')
@section('content')

    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                <hr class="mg-y-30">

                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title"> تعديل بيانات الجمعية</h2>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mg-b-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="az-signin-wrapper">
                    <div class="az-card-signin">
                        <div class="az-signin-header">

                            {{-- Assuming the route is associations.update and you pass $association --}}
                            <form method="POST" action="{{ route('association.profile.update', $association->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row row-sm mg-b-20">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم الجمعية</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $association->name) }}" required disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اسم الشخص المسؤول</label>
                                            <input type="text" name="manager" class="form-control"
                                                value="{{ old('manager', $association->manager) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> رقم الترخيص</label>
                                            <input type="text" class="form-control"
                                                value="{{ $association->license_number }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <p class="mg-b-10">المدينة</p>
                                        <input type="text" class="form-control" value="{{ $association->address }}">
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label> عدد المستفيدين </label>
                                            <input type="text" class="form-control"
                                                value="{{ $association->beneficiaries_count }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> البريد الالكتروني </label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $association->user->email ?? '') }}" required disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> رقم الجوال </label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone', $association->phone) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo" class="form-label">شعار الجمعية</label>
                                            <input type="file" name="logo" id="logo" class="form-control-file"
                                                accept="image/*">
                                            @if ($association->logo)
                                                <img src="{{ $association->logo->preview }}" alt="Logo" class="mt-2"
                                                    style="max-width: 100px; max-height: 100px;">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <p class="mg-b-10">نبذة عن الجمعية </p>
                                        <textarea name="bref" rows="3" class="form-control" required>{{ old('bref', $association->bref) }}</textarea>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-rounded btn-az-primary">حفظ التعديلات</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
