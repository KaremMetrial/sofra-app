<?php

namespace App\Enums;

enum OrderStatus
{
     case Pending = 'pending';
     case Accepted = 'accepted';
     case Preparing = 'preparing';
     case OutForDelivery = 'out_for_delivery';
     case Delivered = 'delivered';
     case Canceled = 'canceled';

     public static function values(): array
     {
         return array_column(self::cases(), 'value');
     }
     public static function labels(): array
    {
        return [
            self::Pending->value => 'Pending',
            self::Accepted->value => 'Accepted',
            self::Preparing->value => 'Preparing',
            self::OutForDelivery->value => 'Out for Delivery',
            self::Delivered->value => 'Delivered',
            self::Canceled->value => 'Canceled',
        ];
    }

    public function getLabel(): string
    {
        return self::labels()[$this->value];
    }

}
