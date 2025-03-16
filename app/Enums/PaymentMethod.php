<?php

namespace App\Enums;

enum PaymentMethod
{
  case Online = 'online';
  case CashOnDelivery = 'cash_on_delivery';

  public static function values(): array
  {
      return array_column(self::cases(), 'value');
  }
  public static function labels(): array
  {
      return [
          self::Online->value => 'Online Payment',
          self::CashOnDelivery->value => 'Cash on Delivery'
      ];
  }

}
