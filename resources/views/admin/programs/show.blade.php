@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.program.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.id') }}
                        </th>
                        <td>
                            {{ $program->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.title') }}
                        </th>
                        <td>
                            {{ $program->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.description') }}
                        </th>
                        <td>
                            {{ $program->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.program.fields.image') }}
                        </th>
                        <td>
                            @if($program->image)
                                <a href="{{ $program->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $program->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection