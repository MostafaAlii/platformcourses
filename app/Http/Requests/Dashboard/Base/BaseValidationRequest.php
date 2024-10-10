<?php
namespace App\Http\Requests\Dashboard\Base;
use Illuminate\Foundation\Http\FormRequest;
class BaseValidationRequest extends FormRequest {
    public function activeLocales() {
        return collect(config('laravellocalization.supportedLocales'))
            ->filter(function ($locale) {
                return $locale['status'] === 1;
            })
            ->keys();
    }
}
