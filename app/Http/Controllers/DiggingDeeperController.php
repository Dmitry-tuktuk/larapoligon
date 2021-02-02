<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller

    /**
     *
     *
     *
     *
     *
     */

{
    public function collections()
    {
        $result = [];

        /**
         * @var \Illuminate\Database\Eloquent\Collection $elequentCollection
         */
        $elequentCollection = BlogPost::withTrashed()->get();

        //dd(__METHOD__, $elequentCollection, $elequentCollection->toArray());

        /**
         * @var \Illuminate\Support\Collection $collection
         */
        $collection = collect($elequentCollection->toArray());

//        dd(
//            get_class($elequentCollection),
//            get_class($collection),
//            $collection
//        );
//        $result['first'] = $collection->first();
//        $result['last'] = $collection->last();
//
//        $result['where']['data'] = $collection
//            ->where('category_id', 10)
//            ->values()
//            ->keyBy('id');
//
//        $result['where']['count'] = $result['where']['data']->count();
//        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
//        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();
//
//        $result['first_where'] = $collection
//            ->firstWhere('created_at', '>','2020.-01-01');

//        $result['map']['all'] = $collection->map(function ($item){
//           $newItem = new \stdClass();
//           $newItem->item_id = $item['id'];
//           $newItem->item_name = $item['title'];
//           $newItem->exist = is_null($item['deleted_at']);
//
//           return $newItem;
//        });
//
//        $result['map']['not_exists'] = $result['map']['all']
//            ->where('exists', '=', false)
//            ->values()
//            ->keyBy('item_id');

//        $collection->transform(function (array $item) {
//            $newItem = new \stdClass();
//            $newItem->item_id = $item['id'];
//            $newItem->item_name = $item['title'];
//            $newItem->exist = is_null($item['deleted_at']);
//            $newItem->created_at = Carbon::parse($item['created_at']);
//
//            return $newItem;
//        });



        dd($collection);
    }
}
