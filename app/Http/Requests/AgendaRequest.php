<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> 'required|max:100',
            'start'=>'required|date| before:end',
            'end'=> 'required|date| after:start',
            'tipo_consulta'=> 'required',
            'fk_medico'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=> 'Selecione o nome do Paciente',
            'title.max'=> 'Tamanho maximo de 100 caracteres',
            'start.date_format'=> 'Informe uma data válida para data/hora inicial',
            'start.required'=> 'É necessário informar uma data inicial',
            'start.before'=> 'A data/hora inicial deve ser menor que a data final',
            'end.date_format'=> 'Informe uma data válida para data/hora final',
            'end.required'=> 'É necessário informar uma data final',
            'end.after'=> 'A data/hora final deve ser maior que a data inicial',
            'end.date'=> 'A data/hora final não é uma data válida',
            'start.date'=> 'A data/hora inicio não é uma data válida'
        ];
    }
}
