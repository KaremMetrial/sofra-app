<?php

namespace App\Enums;

enum ContactType
{
  case Complaint = 'complaint';
  case Suggestion = 'suggestion';
  case Question = 'question';

  public static function values(): array
  {
      return array_column(self::cases(), 'value');
  }

}
