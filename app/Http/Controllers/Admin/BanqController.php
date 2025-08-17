<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBanqRequest;
use App\Http\Requests\StoreBanqRequest;
use App\Http\Requests\UpdateBanqRequest;
use App\Models\Banq;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BanqController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('banq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banqs = Banq::all();

        return view('admin.banqs.index', compact('banqs'));
    }

    public function create()
    {
        abort_if(Gate::denies('banq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banqs.create');
    }

    public function store(StoreBanqRequest $request)
    {
        $banq = Banq::create($request->all());

        return redirect()->route('admin.banqs.index');
    }

    public function edit(Banq $banq)
    {
        abort_if(Gate::denies('banq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banqs.edit', compact('banq'));
    }

    public function update(UpdateBanqRequest $request, Banq $banq)
    {
        $banq->update($request->all());

        return redirect()->route('admin.banqs.index');
    }

    public function show(Banq $banq)
    {
        abort_if(Gate::denies('banq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banqs.show', compact('banq'));
    }

    public function destroy(Banq $banq)
    {
        abort_if(Gate::denies('banq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banq->delete();

        return back();
    }

    public function massDestroy(MassDestroyBanqRequest $request)
    {
        $banqs = Banq::find(request('ids'));

        foreach ($banqs as $banq) {
            $banq->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
