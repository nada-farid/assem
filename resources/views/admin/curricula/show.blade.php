@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.curriculum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.curricula.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.curriculum.fields.id') }}
                        </th>
                        <td>
                            {{ $curriculum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.curriculum.fields.title') }}
                        </th>
                        <td>
                            {{ $curriculum->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.curriculum.fields.description') }}
                        </th>
                        <td>
                            {!! $curriculum->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.curriculum.fields.course') }}
                        </th>
                        <td>
                            {{ $curriculum->course->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.curricula.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection