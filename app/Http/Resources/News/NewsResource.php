<?php

declare(strict_types=1);

namespace App\Http\Resources\News;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Source\SourceResource;
use App\Models\Source;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'image' => $this->image,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'source' => new SourceResource($this->source),
            'categories' => CategoryResource::collection($this->categories)
        ];
    }
}
