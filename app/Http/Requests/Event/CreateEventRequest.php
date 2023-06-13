<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CreateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'type_material_id' => 'required',
            'type_action_id' => 'required',
            'frequency' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $latitude = $this->input('latitude');
            $longitude = $this->input('longitude');

            if (empty($latitude) || empty($longitude)) {
                $validator->errors()->add('location', $this->messages()['location.required']);
            }
        });
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório.',
            'description.required' => 'O campo descrição é obrigatório.',
            'type_material_id.required' => 'O campo tipo de material é obrigatório.',
            'type_action_id.required' => 'O campo tipo de ação é obrigatório.',
            'frequency.required' => 'O campo frequência é obrigatório.',
            'location.required' => 'O campo localização é obrigatório.',
        ];
    }
}
