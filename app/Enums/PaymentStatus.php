<?php

namespace App\Enums;

enum PaymentStatus
{
   case Pending = 'pending';
   case Completed = 'completed';
   case Failed = 'failed';
   case Refunded = 'refunded'; 

   public static function values(): array
   {
       return array_column(self::cases(), 'value');
   }
}
