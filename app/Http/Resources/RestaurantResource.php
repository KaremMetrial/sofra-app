<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class RestaurantResource extends JsonResource
{
    public function toArray($request): array
    {
        $images = json_decode($this->images, true) ?? [];
        $currentTime = Carbon::now()->format('H:i:s');
        $isOpen = $currentTime >= $this->open_time && $currentTime <= $this->close_time;

        return [
            'id'               => $this->id,
            'logo'             => $this->getImageUrl($this->logo),
            'images'           => array_map([$this, 'getImageUrl'], $images),
            'name'             => $this->name,
            'email'            => $this->email,
            'phone_number'     => $this->phone_number,
            'whatsapp_number'  => $this->whatsapp_number,
            'description'      => $this->description,
            'min_order_amount' => $this->min_order_amount,
            'delivery_fee'     => $this->delivery_fee,
            'rating'           => $this->rating,
            'is_open'          => $isOpen,
            'location'         => $this->location,
            'city'             => $this->city->name ?? null,
            'category'         => $this->category->name ?? null,
        ];
    }

    private function getImageUrl($path)
    {
        return $path ? asset($path) : null;
    }
}
