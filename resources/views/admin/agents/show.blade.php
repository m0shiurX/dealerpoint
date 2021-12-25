@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.id') }}
                        </th>
                        <td>
                            {{ $agent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.full_name') }}
                        </th>
                        <td>
                            {{ $agent->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.phone') }}
                        </th>
                        <td>
                            {{ $agent->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.location') }}
                        </th>
                        <td>
                            {{ $agent->location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection