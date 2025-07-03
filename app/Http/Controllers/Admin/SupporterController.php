<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupporterRequest;
use App\Http\Requests\StoreSupporterRequest;
use App\Http\Requests\UpdateSupporterRequest;
use App\Models\Supporter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SupporterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('supporter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Supporter::query()->select(sprintf('%s.*', (new Supporter)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'supporter_show';
                $editGate      = 'supporter_edit';
                $deleteGate    = 'supporter_delete';
                $crudRoutePart = 'supporters';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('official_email', function ($row) {
                return $row->official_email ? $row->official_email : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.supporters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('supporter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supporters.create');
    }

    public function store(StoreSupporterRequest $request)
    {
        $supporter = Supporter::create($request->all());

        return redirect()->route('admin.supporters.index');
    }

    public function edit(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supporters.edit', compact('supporter'));
    }

    public function update(UpdateSupporterRequest $request, Supporter $supporter)
    {
        $supporter->update($request->all());

        return redirect()->route('admin.supporters.index');
    }

    public function show(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supporters.show', compact('supporter'));
    }

    public function destroy(Supporter $supporter)
    {
        abort_if(Gate::denies('supporter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supporter->delete();

        return back();
    }

    public function massDestroy(MassDestroySupporterRequest $request)
    {
        $supporters = Supporter::find(request('ids'));

        foreach ($supporters as $supporter) {
            $supporter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}