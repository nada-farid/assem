<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNewsRequest;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = News::query()->select(sprintf('%s.*', (new News)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'news_show';
                $editGate      = 'news_edit';
                $deleteGate    = 'news_delete';
                $crudRoutePart = 'newss';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('inside_image', function ($row) {
                if ($photo = $row->inside_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('views', function ($row) {
                return $row->views ? $row->views : '';
            });
            $table->editColumn('video_url', function ($row) {
                return $row->video_url ? $row->video_url : '';
            });
            $table->editColumn('background_image', function ($row) {
                if ($photo = $row->background_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'inside_image', 'background_image']);

            return $table->make(true);
        }

        return view('admin.newss.index');
    }

    public function create()
    {
        abort_if(Gate::denies('news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newss.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $news = News::create($request->all());

        if ($request->input('photo', false)) {
            $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('inside_image', false)) {
            $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('inside_image'))))->toMediaCollection('inside_image');
        }

        if ($request->input('background_image', false)) {
            $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('background_image'))))->toMediaCollection('background_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $news->id]);
        }

        return redirect()->route('admin.newss.index');
    }

    public function edit(News $news)
    {
        abort_if(Gate::denies('news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newss.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->all());

        if ($request->input('photo', false)) {
            if (! $news->photo || $request->input('photo') !== $news->photo->file_name) {
                if ($news->photo) {
                    $news->photo->delete();
                }
                $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($news->photo) {
            $news->photo->delete();
        }

        if ($request->input('inside_image', false)) {
            if (! $news->inside_image || $request->input('inside_image') !== $news->inside_image->file_name) {
                if ($news->inside_image) {
                    $news->inside_image->delete();
                }
                $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('inside_image'))))->toMediaCollection('inside_image');
            }
        } elseif ($news->inside_image) {
            $news->inside_image->delete();
        }

        if ($request->input('background_image', false)) {
            if (! $news->background_image || $request->input('background_image') !== $news->background_image->file_name) {
                if ($news->background_image) {
                    $news->background_image->delete();
                }
                $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('background_image'))))->toMediaCollection('background_image');
            }
        } elseif ($news->background_image) {
            $news->background_image->delete();
        }

        return redirect()->route('admin.newss.index');
    }

    public function show(News $news)
    {
        abort_if(Gate::denies('news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newss.show', compact('news'));
    }

    public function destroy(News $news)
    {
        abort_if(Gate::denies('news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsRequest $request)
    {
        $newss = News::find(request('ids'));

        foreach ($newss as $news) {
            $news->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('news_create') && Gate::denies('news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new News();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}