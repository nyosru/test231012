<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,

            'period' => $this->period,
            'period_type' => $this->period_type,
//            "created_at": "2023-10-15T09:23:06.000000Z",
            'period_text' => ( $this->period > 0 ? 'через' : 'было' ).' '.( $this->period * ( $this->period < 0 ? -1 : 1 ) ).' '.$this->period_type.
                ( $this->period > 0 ? '' : ' назад' )
        ];


    }
}
