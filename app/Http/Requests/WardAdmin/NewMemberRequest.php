<?php

namespace App\Http\Requests\WardAdmin;

use Illuminate\Foundation\Http\FormRequest;

class NewMemberRequest extends FormRequest
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
        // dd(request()->all());
        return [
            'card_id' => ['required'],
            'duration_year' => ['required'],
            'name' => ['required'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'date_of_birth' => ['nullable'],
            'nid_number' => ['required', 'unique:customers,nid_number,' . $this->new_member],
            'gender' => ['required'],
            'religion' => ['required'],
            'occupation' => ['required'],

            'division_id' =>  ['required', 'exists:divisions,id'],
            'district_id' =>  ['required', 'exists:districts,id'],
            'upazila_id' =>  ['required', 'exists:upazilas,id'],
            'union_id' =>  ['nullable', 'exists:unions,id'],
            'ward' =>  ['nullable'],
            'status' => ['nullable'],
            'avatar'                => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:1024'],
            'nid_front'                => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:1024'],
            'nid_back'                => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:1024'],
            'post_code' => ['required'],
            'phone' => ['required','unique:customers,phone,' . $this->new_member],

            'family_members' => ['required','array'],
            'family_members.*.name' => ['required'],
            'family_members.*.age' => ['required'],
            'family_members.*.gender' => ['required'],
            'family_members.*.relationship' => ['required'],
        ];
    }
}
