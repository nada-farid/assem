<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProgramRequest;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProgramController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('program_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programs = Program::with(['media'])->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        abort_if(Gate::denies('program_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programs.create');
    }

    public function store(StoreProgramRequest $request)
    {
        $program = Program::create($request->all());

        if ($request->input('image', false)) {
            $program->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $program->id]);
        }

        return redirect()->route('admin.programs.index');
    }

    public function edit(Program $program)
    {
        abort_if(Gate::denies('program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programs.edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->all());

        if ($request->input('image', false)) {
            if (! $program->image || $request->input('image') !== $program->image->file_name) {
                if ($program->image) {
                    $program->image->delete();
                }
                $program->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($program->image) {
            $program->image->delete();
        }

        return redirect()->route('admin.programs.index');
    }

    public function show(Program $program)
    {
        abort_if(Gate::denies('program_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programs.show', compact('program'));
    }

    public function destroy(Program $program)
    {
        abort_if(Gate::denies('program_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $program->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgramRequest $request)
    {
        $programs = Program::find(request('ids'));

        foreach ($programs as $program) {
            $program->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('program_create') && Gate::denies('program_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Program();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
