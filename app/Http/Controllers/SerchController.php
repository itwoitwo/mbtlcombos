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
        $serch_starting_recipe = $request->input('始動技検索');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');
        $serch_words = $request->input('タグ') ?? '';
        $pat = '%' . addcslashes($serch_words, '%_\\') . '%';

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('始動技検索') && $serch_starting_recipe != ''){
            $query->where('recipe', 'LIKE', $serch_starting_recipe . '%');
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

        if($serch_difficulty == '普通'){
            $query->where('difficulty', '簡単')->orWhere('difficulty', $serch_difficulty);
        }elseif($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        if($request->has('タグ') && $serch_words != ''){
            $query->where('words', 'LIKE', $pat);
        }
        
        $count_hits = count($query->get());
        $combos = $query->sortable()->orderBy('created_at', 'desc')->paginate(10);

        $user = \Auth::user();
        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
            'count_hits' => $count_hits,
        ];

        return view('combos.index', $data);
    }

    public function adoptions_serch(Request $request)
    {   
        $query = Combo::query();

        $query->select('combos.*')->join('adopts', 'combos.id', '=', 'adopts.combo_id');
        $query->sortable()->where('adopts.user_id', '=', $request->user_id);

        $serch_fighter = $request->input('キャラクター');
        $serch_starting_recipe = $request->input('始動技検索');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');
        $serch_words = $request->input('タグ') ?? '';
        $pat = '%' . addcslashes($serch_words, '%_\\') . '%';

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('始動技検索') && $serch_starting_recipe != ''){
            $query->where('recipe', 'LIKE', $serch_starting_recipe . '%');
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

        if($serch_difficulty == '普通'){
            $query->where('difficulty', '簡単')->orWhere('difficulty', $serch_difficulty);
        }elseif($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        if($request->has('タグ') && $serch_words != ''){
            $query->where('words', 'LIKE', $pat);
        }

        $count_hits = count($query->get());
        $combos = $query->orderBy('created_at', 'desc')->paginate(10);

        $user = User::find($request->user_id);
        if($user == null){
            return redirect()->route('top_page');
        }

        $countAdopted = 0;
        $countFavorited = 0;
        $countUserStatusCombos = $user->combos()->get();
        
        foreach($countUserStatusCombos as $countUserStatusCombo){
            $countAdopted += $countUserStatusCombo->adoption_count;
            $countFavorited += $countUserStatusCombo->favorite_count;
        }

        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
            'count_hits' => $count_hits,
        ];

        $data += $this->counts($user);

        return view('users.adoptions_index', $data);
    }

    public function favorites_index_serch(Request $request)
    {
        $query = Combo::query();

        $query->select('combos.*')->join('favorites', 'combos.id', '=', 'favorites.combo_id');
        $query->sortable()->where('favorites.user_id', '=', $request->user_id);

        $serch_fighter = $request->input('キャラクター');
        $serch_starting_recipe = $request->input('始動技検索');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');
        $serch_words = $request->input('タグ') ?? '';
        $pat = '%' . addcslashes($serch_words, '%_\\') . '%';

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('始動技検索') && $serch_starting_recipe != ''){
            $query->where('recipe', 'LIKE', $serch_starting_recipe . '%');
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

        if($serch_difficulty == '普通'){
            $query->where('difficulty', '簡単')->orWhere('difficulty', $serch_difficulty);
        }elseif($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        if($request->has('タグ') && $serch_words != ''){
            $query->where('words', 'LIKE', $pat);
        }

        $count_hits = count($query->get());
        $combos = $query->orderBy('created_at', 'desc')->paginate(10);

        $user = User::find($request->user_id);
        if($user == null){
            return redirect()->route('top_page');
        }

        $countAdopted = 0;
        $countFavorited = 0;
        $countUserStatusCombos = $user->combos()->get();
        
        foreach($countUserStatusCombos as $countUserStatusCombo){
            $countAdopted += $countUserStatusCombo->adoption_count;
            $countFavorited += $countUserStatusCombo->favorite_count;
        }

        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
            'count_hits' => $count_hits,
        ];

        $data += $this->counts($user);

        return view('users.favorites_index', $data);
    }

    public function mycombos_serch(Request $request)
    {
        $query = Combo::query();

        $query->sortable()->where('user_id', '=', $request->user_id);

        $serch_fighter = $request->input('キャラクター');
        $serch_starting_recipe = $request->input('始動技検索');
        $serch_ver = $request->input('version');
        $serch_place = $request->input('状況');
        $serch_starting = $request->input('始動技');
        $serch_counter = $request->input('counter_hit');
        $serch_magic = $request->input('magic_circuit');
        $serch_moon = $request->input('moon');
        $serch_difficulty = $request->input('コンボ難易度');
        $serch_video = $request->input('video');
        $serch_words = $request->input('タグ') ?? '';
        $pat = '%' . addcslashes($serch_words, '%_\\') . '%';

        if($request->has('キャラクター') && $serch_fighter != ''){
            $query->where('fighter', $serch_fighter);
        }

        if($request->has('始動技検索') && $serch_starting_recipe != ''){
            $query->where('recipe', 'LIKE', $serch_starting_recipe . '%');
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

        if($serch_difficulty == '普通'){
            $query->where('difficulty', '簡単')->orWhere('difficulty', $serch_difficulty);
        }elseif($request->has('コンボ難易度') && $serch_difficulty != ''){
            $query->where('difficulty', $serch_difficulty);
        }

        if($request->has('video') && $serch_video != ''){
            $query->whereNotNull('video');
        }

        if($request->has('タグ') && $serch_words != ''){
            $query->where('words', 'LIKE', $pat);
        }

        $count_hits = count($query->get());
        $combos = $query->orderBy('created_at', 'desc')->paginate(10);

        $user = User::find($request->user_id);
        if($user == null){
            return redirect()->route('top_page');
        }

        $countAdopted = 0;
        $countFavorited = 0;
        $countUserStatusCombos = $user->combos()->get();
        
        foreach($countUserStatusCombos as $countUserStatusCombo){
            $countAdopted += $countUserStatusCombo->adoption_count;
            $countFavorited += $countUserStatusCombo->favorite_count;
        }

        $data = [
            'user' => $user,
            'combos' => $combos,
            'request' => $request,
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
            'count_hits' => $count_hits,
        ];

        $data += $this->counts($user);

        return view('users.mycombos', $data);
    }
}
