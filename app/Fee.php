<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use RajaOngkir;

use App\Product;

class Fee extends Model
{
    protected $fillable = ['origin', 'destination', 'courier', 'service', 'weight', 'cost', 'update_at'];

    public static function getCost($origin_id, $destination_id, $weight, $courier, $service)
    {
        $free = static::firstOrCreate([
            'origin'=>$origin_id,
            'destination'=>$destination_id,
            'weight'=>$weight,
            'courier'=>$courier,
            'service'=>$service
        ]);

    if ($free->haveCost() && !$free->isNeedUpdate()) return $free->cost;
        return $free->populateCost();

    }

    protected function haveCost()
    {
        return $this->cost > 0;
    }

    protected function isNeedUpdate()
    {
        return $this->updated_at->diffInDays(Carbon::today()) > 7;
    }

    public function populateCost()
    {
        $params = $this->toArray();
        $costs = RajaOngkir::Cost($params)->get();

        $cost = 0;
        foreach ($costs[0]['costs'] as $result) {
            if ($result['service'] == $this->service) {
                $cost = $result['cost'][0]['value'];
                break;
            }
        }

        $cost = $cost > 0 ? $cost : config('rajaongkir.fallback_fee');
        //update cost & force update  'update_at' field
        $this->update(['cost' => $cost, 'updated_at'=>Carbon::today()]);
        return $cost;
    }
}
