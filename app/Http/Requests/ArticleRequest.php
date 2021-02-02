<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FirstStartWithAtSign;

class ArticleRequest extends FormRequest
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
            'image'        => 'image',
            'title'        => ['required', 'max:10', new FirstStartWithAtSign],
            'description'  => ['required', 'min:50', new FirstStartWithAtSign],
            'total'        => 'required|min:50',
        ];
    }

    public function getValidatorInstance()
    {
        if ($this->input('title') && $this->input('description')) {
            $total = $this->input('title') . $this->input('description');

            $this->merge([
                'total' => $total
            ]);
        }

        return parent::getValidatorInstance();
    }



}
