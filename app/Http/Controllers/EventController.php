<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{


    /**
     * @OA\Post(
     *      path="/api/event",
     *      operationId="addEvent",
     *      tags={"Event"},
     *      summary="Добавление события",
     *      description="Метод добавляет новое событие",
     *     @OA\Parameter(
     *          name="title",
     *          description="Имя события",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="place",
     *          description="место проведения мероприятия",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="date",
     *          description="дата проведения мероприятия",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *     @OA\JsonContent(ref="#/components/schemas/Event")
     *       ),
     *     )
     */
    public function store(EventCreateRequest $request)
    {
        $validated = $request->validated();
        $validated['name'] = $request->title . ' ' . $request->place;
        $new = new Event($validated);
        $event_new = $new->save();
        return response()->json($new);
    }

//    /**
//     * @OA\Get(
//     *      path="/channels/{alias}",
//     *      operationId="getListAvailableChannel",
//     *      tags={"Channels"},
//     *      summary="Получение списка доступных драйверов для канала",
//     *      description="Метод возвращает данные ...",
//     *     @OA\Parameter(
//     *          name="alias",
//     *          description="Alias канала (email)",
//     *          required=true,
//     *          in="path",
//     *          @OA\Schema(
//     *              type="string"
//     *          )
//     *      ),
//     *     @OA\Response(
//     *          response=200,
//     *          description="Successful operation",
//     *       ),
//     *     )
//     */
////     *     @OA\JsonContent(ref="#/components/schemas/Channel")
//    public function getListAvailableChannel()
//    {
//        //...
//    }
//    /**
//     * * @OA\Get(
//     *      path="/channels/",
//     *      operationId="getChannels",
//     *      tags={"Channels"},
//     *      summary="Получить список всех доступных каналов",
//     *      description="Получаем список всех доступных каналов",
//     *     @OA\Response(
//     *         response=200,
//     *          description="successful operation",
//     *       ),
//     *      @OA\Response(
//     *         response=400,
//     *         description="Invalid ID supplied"
//     *      )
//     *     )
//     */
//    //     *          @OA\JsonContent(ref="#/components/schemas/Channel")
//    public function getChannels()
//    {
//        //...
//    }

}
