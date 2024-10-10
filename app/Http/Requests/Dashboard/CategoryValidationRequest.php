<?php
namespace App\Http\Requests\Dashboard;
use App\Http\Requests\Dashboard\Base\BaseValidationRequest;
class CategoryValidationRequest extends BaseValidationRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $locales = $this->activeLocales();
        $rules = [
            'parent' => 'nullable|exists:categories,id',
        ];
        foreach ($locales as $locale) {
            $rules["name.$locale"] = 'required|string|max:255';
            $rules["description.$locale"] = 'nullable|string|max:1000';
        }
        return $rules;
    }
}
