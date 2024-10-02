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
            'property_name' => 'required',
            'property_description'=> 'required',
            'property_reg_no' => 'required',
            'property_address' => 'required',
            'property_price' => 'required',
            'property_total_shares' => 'required',
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
            'property_name' => 'Name is required',
            'property_description'=> 'Description is required',
            'property_reg_no' => 'Registration No is required',
            'property_address' => 'Address is required',
            'property_price' => 'Price is required',
            'property_total_shares' => 'Total Shares is required',
            'property_image' => 'Image is required',
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
