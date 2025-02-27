<?php

declare(strict_types=1);

namespace App\Feature\Post\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $title
 * @property-read string $description
 * @property-read string $content
 * @property-read string|null $image
 */

class CreatePostRequest extends FormRequest
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
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'url'],
        ];
    }
}
