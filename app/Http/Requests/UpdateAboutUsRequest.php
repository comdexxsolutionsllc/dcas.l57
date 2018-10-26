<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
{

    protected $guard;

    public function __construct(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = [],
        $content = null
    ) {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);

        $this->guard = \Auth::guard('employee');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->guard->check()) {
            return $this->guard->user()->hasRole('superadmin') ? true : false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'        => 'required|string|min:1|max:255',
            'portrait'    => 'nullable|string|min:0|max:255',
            'job_title'   => 'required|string|min:1|max:255',
            'job_summary' => 'required',

        ];

        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['name', 'portrait', 'job_title', 'job_summary']);

        return $data;
    }

    /**
     * Create the resource.
     *
     * @param $employee
     *
     * @return mixed
     */
    public function persist($employee)
    {
        try {
            $employee->update($this->validated());

            return redirect()->route('aboutus')->with('success_message', 'Comment was successfully updated!');
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
