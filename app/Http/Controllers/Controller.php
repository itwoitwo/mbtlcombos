<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function counts($user) {
        $count_combos = $user->combos()->count();
        $count_favorites = $user->favorites()->count();
        $count_adopts = $user->adopts()->count();

        return [
            'count_combos' => $count_combos,
            'count_favorites' => $count_favorites,
            'count_adopts' => $count_adopts,
        ];
    }
}
