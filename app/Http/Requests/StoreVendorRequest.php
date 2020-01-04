<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();

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
            'NamaPerusahaan' => 'required |unique:vendors,nama',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'KodePos' => 'required | numeric',
            'Telepon1' => 'required',
            
            // 'cover' => 'image|max:2048'



        ];

    }
}
