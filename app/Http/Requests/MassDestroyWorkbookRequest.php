<?php

namespace App\Http\Requests;

use App\Models\Workbook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWorkbookRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('workbook_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:workbooks,id',
        ];
    }
}
