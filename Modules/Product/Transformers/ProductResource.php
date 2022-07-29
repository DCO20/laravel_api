<?php

namespace Modules\Product\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'slug' => $this->slug,
            'image' => $this->image,
            'price' => $this->price,
            'description' => $this->description,
        ];
    }
}
