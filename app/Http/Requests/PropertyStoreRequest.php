<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
            //
            'county'  => 'required',
            'country'  => 'required',
            'town'  => 'required',
            'description'  => 'required',
            'address'  => 'required',
            'image_full'  => 'required|image',
            'num_bedrooms'  => 'required',
            'num_bathrooms'  => 'required',
            'price'  => 'required',
            'for'  => 'required',
            'property_type_id'  => 'required',

        ];
    }
}
