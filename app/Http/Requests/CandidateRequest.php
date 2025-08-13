<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
        $rules = [
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'candidate_no' => 'required|integer|min:1',
            'partylist_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];

        // Only require 'type' for positions that use it
        $route = $this->route();
        $typeRequiredRoutes = [
            'pios.store',
            'business_managers.store',
            'peace_officers.store',
        ];
        if ($route && in_array($route->getName(), $typeRequiredRoutes)) {
            $rules['type'] = 'required|in:internal,external';
        }

        return $rules;
    }
}
