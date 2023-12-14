<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethod;
use App\Models\Order;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Collection;

class AnalysisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function orderCount(Request $request)
    {

        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        return $this->response(
            Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count());
    }

    public function orderSalesSum(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        return $this->response(
            Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->sum('sum'));
    }

    /*
     * Ratio of delivery methods in the time interval
     */
    public function deliveryMethodsRatio(Request $request)
    {
//        if(Cache::has('DeliveryMethodsRatio'))
//        {
//            return Cache::get('DeliveryMethodsRatio');
//        }

        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        $response = [];

        $allOrders = Order::query()
            ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
            ->whereRelation('status', 'code', 'closed')
            ->count();

        foreach (DeliveryMethod::all() as $deliveryMethod) {
            $DeliveryMethodOrder = $deliveryMethod->orders()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count();

            $response[] = [
                'name' => $deliveryMethod->getTranslations('name'),
                'percentage' => round($DeliveryMethodOrder * 100 / $allOrders, 2),
                'amount' => $DeliveryMethodOrder
            ];
        }

//        Cache::put('DeliveryMethodsRatio', $response, Carbon::now()->addDay());

        return $this->response($response);
    }

    public function ordersCountByDays(Request $request)
    {
        $from = Carbon::now()->subMonth();
        $to = Carbon::now();

        if ($request->has(['from', 'to'])) {
            $from = $request->from;
            $to = $request->to;
        }

        $days = CarbonPeriod::create($from, $to);
        $response = new Collection();

        LazyCollection::make($days->toArray())->each(function ($day) use ($from, $to, $response) {
            $count = Order::query()
                ->whereBetween('created_at', [$from, Carbon::parse($to)->endOfDay()])
                ->whereRelation('status', 'code', 'closed')
                ->count();
            $response[] = [
                'date' => $day->format('Y-m-d'),
                'orders_count' => $count
            ];
        });

          return $this->response($response);
    }


}
