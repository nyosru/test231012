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

        if ($interval->y > 0) {
            $res = [$interval->y, 'Лет'];
        } else if ($interval->m > 0) {
            $res = [$interval->m, 'Месяцев'];
        } else if ($interval->d > 0) {
            $res = [$interval->d, 'Дней'];
        } else {
            throw new \Exception('date diff no', 1);
        }

        return $res;
    }
}
