<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkbookRequest;
use App\Http\Requests\StoreWorkbookRequest;
use App\Http\Requests\UpdateWorkbookRequest;
use App\Models\Agent;
use App\Models\Product;
use App\Models\Workbook;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkbookController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('workbook_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workbooks = Workbook::with(['product', 'agent'])->get();

        $products = Product::get();

        $agents = Agent::get();

        return view('admin.workbooks.index', compact('agents', 'products', 'workbooks'));
    }

    public function create()
    {
        abort_if(Gate::denies('workbook_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.workbooks.create', compact('agents', 'products'));
    }

    public function store(StoreWorkbookRequest $request)
    {
        $workbook = Workbook::create($request->all());

        return redirect()->route('admin.workbooks.index');
    }

    public function edit(Workbook $workbook)
    {
        abort_if(Gate::denies('workbook_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workbook->load('product', 'agent');

        return view('admin.workbooks.edit', compact('agents', 'products', 'workbook'));
    }

    public function update(UpdateWorkbookRequest $request, Workbook $workbook)
    {
        $workbook->update($request->all());

        return redirect()->route('admin.workbooks.index');
    }

    public function show(Workbook $workbook)
    {
        abort_if(Gate::denies('workbook_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workbook->load('product', 'agent');

        return view('admin.workbooks.show', compact('workbook'));
    }

    public function destroy(Workbook $workbook)
    {
        abort_if(Gate::denies('workbook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workbook->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkbookRequest $request)
    {
        Workbook::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
