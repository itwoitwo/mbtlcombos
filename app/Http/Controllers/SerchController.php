<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Combo;

class SerchController extends Controller
{
    public function serch(Request $request)
    {
        $query = Combo::query();
        $serch_fighter = $request->input('キャラクター');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('version') && $serch_ver != ''){
            $query->where('version', $serch_ver);
        }

        if($request->has('状況') && $serch_place != ''){
            $query->where('place', $serch_place);
        }

        if($request->has('始動技') && $serch_starting != ''){
            $query->where('starting', $serch_starting);
        }

        if($serch_counter == 'カウンター限定'){
            $query->where('counter_hit', 'フェイタル限定')->orWhere('counter_hit', $serch_counter);
        }elseif($request->has('counter_hit') && $serch_counter != ''){
            $query->where('counter_hit', $serch_counter);
        }
        
        if($request->has('magic_circuit') && $serch_magic != ''){
            $query->where('magic_circuit', $serch_magic);
        }
        
        if($request->has('moon') && $serch_moon != ''){
            $query->where('moon', $serch_moon);
        }

        if($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        $combos = $query->sortable()->orderBy('created_at', 'desc')->paginate(5);

        $user = \Auth::user();
        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
        ];

        return view('combos.index', $data);
    }

    public function adoptions_serch(Request $request)
    {   
        $query = Combo::query();

        $query->select('combos.*')->join('adopts', 'combos.id', '=', 'adopts.combo_id');
        $query->sortable()->where('adopts.user_id', '=', $request->user_id);

        $serch_fighter = $request->input('キャラクター');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('version') && $serch_ver != ''){
            $query->where('version', $serch_ver);
        }

        if($request->has('状況') && $serch_place != ''){
            $query->where('place', $serch_place);
        }

        if($request->has('始動技') && $serch_starting != ''){
            $query->where('starting', $serch_starting);
        }

        if($serch_counter == 'カウンター限定'){
            $query->where('counter_hit', 'フェイタル限定')->orWhere('counter_hit', $serch_counter);
        }elseif($request->has('counter_hit') && $serch_counter != ''){
            $query->where('counter_hit', $serch_counter);
        }
        
        if($request->has('magic_circuit') && $serch_magic != ''){
            $query->where('magic_circuit', $serch_magic);
        }
        
        if($request->has('moon') && $serch_moon != ''){
            $query->where('moon', $serch_moon);
        }

        if($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        $combos = $query->orderBy('created_at', 'desc')->paginate(5);

        $user = User::find($request->user_id);

        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
        ];

        return view('users.adoptions_index', $data);
    }

    public function favorites_index_serch(Request $request)
    {
        $query = Combo::query();

        $query->select('combos.*')->join('favorites', 'combos.id', '=', 'favorites.combo_id');
        $query->sortable()->where('favorites.user_id', '=', $request->user_id);

        $serch_fighter = $request->input('キャラクター');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('version') && $serch_ver != ''){
            $query->where('version', $serch_ver);
        }

        if($request->has('状況') && $serch_place != ''){
            $query->where('place', $serch_place);
        }

        if($request->has('始動技') && $serch_starting != ''){
            $query->where('starting', $serch_starting);
        }

        if($serch_counter == 'カウンター限定'){
            $query->where('counter_hit', 'フェイタル限定')->orWhere('counter_hit', $serch_counter);
        }elseif($request->has('counter_hit') && $serch_counter != ''){
            $query->where('counter_hit', $serch_counter);
        }
        
        if($request->has('magic_circuit') && $serch_magic != ''){
            $query->where('magic_circuit', $serch_magic);
        }
        
        if($request->has('moon') && $serch_moon != ''){
            $query->where('moon', $serch_moon);
        }

        if($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        $combos = $query->orderBy('created_at', 'desc')->paginate(5);

        $user = User::find($request->user_id);

        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
        ];

        return view('users.favorites_index', $data);
    }

    public function mycombos_serch(Request $request)
    {
        $query = Combo::query();

        $query->sortable()->where('user_id', '=', $request->user_id);

        $serch_fighter = $request->input('キャラクター');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('version') && $serch_ver != ''){
            $query->where('version', $serch_ver);
        }

        if($request->has('状況') && $serch_place != ''){
            $query->where('place', $serch_place);
        }

        if($request->has('始動技') && $serch_starting != ''){
            $query->where('starting', $serch_starting);
        }

        if($serch_counter == 'カウンター限定'){
            $query->where('counter_hit', 'フェイタル限定')->orWhere('counter_hit', $serch_counter);
        }elseif($request->has('counter_hit') && $serch_counter != ''){
            $query->where('counter_hit', $serch_counter);
        }
        
        if($request->has('magic_circuit') && $serch_magic != ''){
            $query->where('magic_circuit', $serch_magic);
        }
        
        if($request->has('moon') && $serch_moon != ''){
            $query->where('moon', $serch_moon);
        }

        if($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        $combos = $query->orderBy('created_at', 'desc')->paginate(5);

        $user = User::find($request->user_id);

        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
        ];

        return view('users.mycombos', $data);
    }
}