<?php

namespace App\Filament\Resources\JenisMakananResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJenisMakananRequest extends FormRequest
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
			'nama' => 'required',
			'deskripsi' => 'required|string',
			'kalori_per_porsi' => 'required',
			'kategori' => 'required',
			'cocok_untuk_diet' => 'required'
		];
    }
}
