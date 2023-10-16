<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @OA\Tag(
 *     name="Event",
 *     description="Работа с 'событиями'"
 * )
 */
class EventController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/event",
     *      operationId="eventGet",
     *      tags={"Event"},
     *      summary="получение списка событий в кеше",
     *      description="Возвращает список событий из кеша ( 2) при получении списка ( get index ) записей вывожу только то что в кеше )",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Event")
     *       ),
     *     )
     */
    public function index(Request $request)
    {
        $data = Cache::get('event') ?? [];
        return EventResource::collection($data);
    }

    /**
     * @OA\Get(
     *      path="/api/event2",
     *      operationId="eventGet2",
     *      tags={"Event"},
     *      summary="получение списка событий",
     *      description="3) при получении как в норм приложении ( get index2 ) получаю данные, кеш на автомате прогревается если кончилось время хранения",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Event")
     *       ),
     *     )
     */
    public function index2(Request $request)
    {

        $value = Cache::remember('event', 300, function () {
            return Event::all();
        });

        return EventResource::collection($value);
    }

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
