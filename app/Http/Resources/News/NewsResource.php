<?php

namespace App\Http\Resources\News;

use App\Models\Source;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request)
    {
        $source = Source::find($this->source_id);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'image' => $this->image,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'source' => [
                'id' => $source->id ?? '',
                'title' => $source->title ?? '',
                ],
        ];
    }
}
