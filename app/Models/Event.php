<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Event",
 *     description="Event model",
 *     @OA\Xml(
 *         name="Event"
 *     )
 * )
 */
class Event extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     title="id",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var bigInteger
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Название события",
     *      example="aaaaa"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="date",
     *     description="Date event",
     *     example="2020-01-27",
     *     format="date",
     *     type="string"
     * )
     */
    private $date;

    /**
     * @OA\Property(
     *     title="period",
     *     description="period",
     *     format="int64",
     *     example=1
     * )
     *
     * @var bigInteger
     */
    private $period;

    /**
     * @OA\Property(
     *     title="period_type",
     *     description="тип периода",
     *     format="string",
     *     example="день"
     * )
     *
     * @var string
     */
    private $period_type;


//    /**
//     * @OA\Property(
//     *      title="Title",
//     *      description="Title event's",
//     *      example="aaaaa"
//     * )
//     *
//     * @var string
//     */
//    private $alias;
//
//    /**
//     * @OA\Property(
//     *      title="Is Active",
//     *      description="Активный канала",
//     *      example="true"
//     * )
//     *
//     * @var boolean
//     */
//    private $is_active;
//    /**
//     * @OA\Property(
//     *      title="Default Driver Alias",
//     *      description="Драйвер по умолчанию на этом канале",
//     *      example="mailtrap"
//     * )
//     *
//     * @var string
//     */
//    private $default_driver_alias;
    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $created_at;
    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $updated_at;


    protected $table = 'event';


    protected $fillable = [
        'name',
        'date',
        'period',
        'period_type'
    ];

}
