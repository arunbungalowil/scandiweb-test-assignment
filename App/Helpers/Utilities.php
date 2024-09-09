<?php
namespace App\Helpers;
class Utilities
{
    public static function escapeSpecialChars($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
