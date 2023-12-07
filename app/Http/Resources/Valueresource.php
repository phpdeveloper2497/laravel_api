<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Valueresource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'valuable_type'=> $this->valuable_type,
            'name' =>$this->getTranslations('name'),
        ];
    }
}
