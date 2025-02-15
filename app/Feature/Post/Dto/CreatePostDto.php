<?php

declare(strict_types=1);

namespace App\Feature\Post\Dto;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class CreatePostDto extends ValidatedDTO
{
	protected function rules(): array
	{
		return [
			'title' => ['required', 'string', 'max:255'],
			'description' => ['required', 'string'],
			'content' => ['required', 'string'],
			'image' => ['nullable', 'url'],
		];
	}

	protected function defaults(): array
	{
		return [];
	}

	protected function casts(): array
	{
		return [];
	}
}
