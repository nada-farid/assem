<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNeedRequest;
use App\Http\Requests\StoreNeedRequest;
use App\Http\Requests\UpdateNeedRequest;
use App\Models\Need;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NeedController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('need_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Need::query()->select(sprintf('%s.*', (new Need)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'need_show';
                $editGate      = 'need_edit';
                $deleteGate    = 'need_delete';
                $crudRoutePart = 'needs';

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
            $table->editColumn('reason', function ($row) {
                return $row->reason ? $row->reason : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.needs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('need_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.needs.create');
    }

    public function store(StoreNeedRequest $request)
    {
        $need = Need::create($request->all());

        return redirect()->route('admin.needs.index');
    }

    public function edit(Need $need)
    {
        abort_if(Gate::denies('need_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.needs.edit', compact('need'));
    }

    public function update(UpdateNeedRequest $request, Need $need)
    {
        $need->update($request->all());

        return redirect()->route('admin.needs.index');
    }

    public function show(Need $need)
    {
        abort_if(Gate::denies('need_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.needs.show', compact('need'));
    }

    public function destroy(Need $need)
    {
        abort_if(Gate::denies('need_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $need->delete();

        return back();
    }

    public function massDestroy(MassDestroyNeedRequest $request)
    {
        $needs = Need::find(request('ids'));

        foreach ($needs as $need) {
            $need->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
