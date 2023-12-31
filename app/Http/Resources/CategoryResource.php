<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'parent_id' => $this->parent_id,
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'icon' => $this->icon,
            'order' => $this->order,
            'child_categories' => $this->ChildCategories,
        ];
    }
}
