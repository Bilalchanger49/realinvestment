<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rulesLivewire()
    {
        return [
            'property_name' => 'required|string|max:255',
            'property_description'=> 'required|string|max:255',
            'property_reg_no' => 'required|integer',
            'property_address' => 'required|string',
            'property_price' => 'required|integer',
            'property_rent' => 'required|integer',
            'property_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
//    public function rules(): array
//    {
//        return [
//            'property_name' => 'required',
//            'property_description'=> 'required',
//            'property_reg_no' => 'required',
//            'property_address' => 'required',
//            'property_price' => 'required',
//            'property_total_shares' => 'required',
//            'property_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ];
//    }


    public function messagesLivewire()
    {
        return [
            'property_name.required' => 'Name is required',
            'property_name.string' => 'Name must be a valid string',
            'property_name.max' => 'Name must not exceed 255 characters',

            'property_description.required' => 'Description is required',
            'property_description.string' => 'Description must be a valid string',
            'property_description.max' => 'Description must not exceed 255 characters',

            'property_reg_no.required' => 'Registration No is required',
            'property_reg_no.integer' => 'Registration No must be an integer',

            'property_address.required' => 'Address is required',
            'property_address.string' => 'Address must be a valid string',

            'property_price.required' => 'Price is required',
            'property_price.integer' => 'Price must be an integer',

            'property_rent.required' => 'Rent price is required',
            'property_rent.integer' => 'Rent price must be an integer',

            'property_image.required' => 'Image is required',
            'property_image.image' => 'The file must be an image',
            'property_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg',
            'property_image.max' => 'The image must not be larger than 2MB',
        ];
    }

//    public function Messages()
//    {
//        return [
//            'property_name' => 'required',
//            'property_description'=> 'required',
//            'property_reg_no' => 'required',
//            'property_address' => 'required',
//            'property_price' => 'required',
//            'property_total_shares' => 'required',
//            'property_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ];
//    }
}
