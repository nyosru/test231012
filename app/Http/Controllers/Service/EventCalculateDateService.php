<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class EventCalculateDateService extends Controller
{

    public static function calculate(string $date): array
    {
        $now = new \DateTime(); // текущее время на сервере
        $date = \DateTime::createFromFormat("d-m-Y", $date); // задаем дату в любом формате
        $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
        // дата до или после текущей даты
        $znak = ($date < $now) ? -1: 1;

        if ($interval->y > 0) {
            $res = [$interval->y * $znak, 'год'];
        } else if ($interval->m > 0) {
            $res = [$interval->m * $znak, 'месяц'];
        } else if ($interval->d > 0) {
            $res = [$interval->d * $znak, 'день'];
        } else {
            throw new \Exception('date diff no', 1);
        }

        return $res;
    }
}
