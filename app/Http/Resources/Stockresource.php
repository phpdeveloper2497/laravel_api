<?php

namespace App\Http\Resources;

use App\Models\Attribute;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Stockresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $result = [
            'stock_id' => $this->id,
            'quantity' => $this->quantity,
        ];
        return $this->getAttributes($result);
    }

    public function GetAttributes(array $result): array
    {
        $attributes = json_decode($this->attributes);
        foreach ($attributes as $stockAttrirbute) {
    /*  TODO cache it*/
            $attribute = Attribute::find($stockAttrirbute->attribute_id);
            $value = Value::find($stockAttrirbute->value_id);

            $result[$attribute->name] = $value->getTranslations('name');
        }

        return $result;
    }
}
