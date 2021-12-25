@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workbook.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workbooks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.id') }}
                        </th>
                        <td>
                            {{ $workbook->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.product') }}
                        </th>
                        <td>
                            {{ $workbook->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.unit_price') }}
                        </th>
                        <td>
                            {{ $workbook->unit_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.quantity') }}
                        </th>
                        <td>
                            {{ $workbook->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.total_price') }}
                        </th>
                        <td>
                            {{ $workbook->total_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.returned_quantity') }}
                        </th>
                        <td>
                            {{ $workbook->returned_quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workbook.fields.agent') }}
                        </th>
                        <td>
                            {{ $workbook->agent->full_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workbooks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection