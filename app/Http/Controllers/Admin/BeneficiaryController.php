<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBeneficiaryRequest;
use App\Http\Requests\StoreBeneficiaryRequest;
use App\Http\Requests\UpdateBeneficiaryRequest;
use App\Models\Beneficiary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BeneficiaryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('beneficiary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Beneficiary::query()->select(sprintf('%s.*', (new Beneficiary)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'beneficiary_show';
                $editGate      = 'beneficiary_edit';
                $deleteGate    = 'beneficiary_delete';
                $crudRoutePart = 'beneficiaries';

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

            $table->editColumn('identity_number', function ($row) {
                return $row->identity_number ? $row->identity_number : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? Beneficiary::MARITAL_STATUS_SELECT[$row->marital_status] : '';
            });

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.beneficiaries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaries.create');
    }

    public function store(StoreBeneficiaryRequest $request)
    {
        $beneficiary = Beneficiary::create($request->all());

        return redirect()->route('admin.beneficiaries.index');
    }

    public function edit(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaries.edit', compact('beneficiary'));
    }

    public function update(UpdateBeneficiaryRequest $request, Beneficiary $beneficiary)
    {
        $beneficiary->update($request->all());

        return redirect()->route('admin.beneficiaries.index');
    }

    public function show(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaries.show', compact('beneficiary'));
    }

    public function destroy(Beneficiary $beneficiary)
    {
        abort_if(Gate::denies('beneficiary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiary->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaryRequest $request)
    {
        $beneficiaries = Beneficiary::find(request('ids'));

        foreach ($beneficiaries as $beneficiary) {
            $beneficiary->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
