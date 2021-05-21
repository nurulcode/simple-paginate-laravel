<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

/**
  * Generates the pagination of items in an array or collection.
  *
  * @param array|Collection      $items
  * @param int   $perPage
  * @param int  $page
  *
  * @return LengthAwarePaginator
  */

trait SimplePaginate
{
    public function paginate($items, $perPage = 3, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);
    }
}
