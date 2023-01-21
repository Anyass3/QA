<?php

namespace App\Models;


class Questions
{
    public static function all()
    {
        return self::random(10);
    }

    public static function random($num = 5)
    {
        for ($i = 0; $i < $num; $i++) {
            $q[$i] = fake()->sentence(100);
        }
        return $q;
    }
}
