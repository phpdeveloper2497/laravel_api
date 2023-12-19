<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "full_name" => $this->lastname . ' ' .$this->firstname,
            "email" => $this->email,
            "phone" => $this->phone,
            "settings" => UserSettingResource::collection($this->settings),
            "roles" => $this->getRoleNames(),
            "photo" => $this->photos()->exists() ? Storage::url($this->photos()->first()->path) : null,
            "created_at" => $this->created_at,
        ];
    }
}
