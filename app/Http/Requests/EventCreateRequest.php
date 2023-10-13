<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventCreateRequest extends FormRequest
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
//            '' => 'required|unique:posts|max:255',
            'title' => 'required|string|max:255', // (varchar название мероприятия)
            'place' => 'required|string|max:255',  // (varchar место проведения мероприятия)
            'date' => 'required|date' // (date дата проведения мероприятия)
        ];
    }
}
