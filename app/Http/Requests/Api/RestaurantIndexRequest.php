<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantIndexRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'city_id' => ['nullable', 'integer', 'exists:cities,id'],
          'search'  => ['nullable', 'string', 'max:255'],
          'cursor'  => ['nullable', 'string']
        ];
    }
    public function messages()
    {
        return [
            'city_id.exists' => 'المدينة غير موجودة.',
            'city_id.integer' => 'يجب أن يكون معرف المدينة رقمًا صحيحًا.',
            'search.string' => 'يجب أن يكون البحث نصًا.',
        ];
    }
}
