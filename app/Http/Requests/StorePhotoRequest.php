<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
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

            'title'=> 'required',
            'category_id' =>'nullable|exists:categories,id',
            'featured_id' => 'nullable|exists:featureds,id',   
            'description'=>'nullable',
            'image_path'=>'required|image|mimes:jpeg,png,jpg,gif|max:51200',            
                
        ];
    }
}
