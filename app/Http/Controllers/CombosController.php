<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Combo;
use App\User;



class CombosController extends Controller
{
    public function index()
    {
        $combos = Combo::all();
        $combos = Combo::sortable()->orderBy('created_at', 'desc')->paginate(10);
        $user = \Auth::user();
        $data = [
            'user' => $user,
            'combos' => $combos,
        ];

        return view('combos.index', $data);
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'キャラクター' => 'required|string|',
            'ダメージ' => 'integer|nullable|digits:4',
            'version' => 'required|string|',
            '始動技' => 'required|string|',
            'counter_hit' => 'required|string|',
            '状況' => 'required|string|max:8|',
            'magic_circuit' => 'required|integer|',
            'moon' => 'required|integer|',
            'コンボレシピ' => 'required|string|max:191|min:5|regex:/.>.+>/|',
            'explain' => 'string|max:191|nullable|',
            '動画' => 'string|max:191|nullable|regex:/(https?:\/\/(www\.)?[0-9a-z\-\.]+:?[0-9]{0,5})/|',
            'コンボ難易度' => 'required|string|',
            '一言コメント' => 'required|string|max:20|',
        ]);

        $request->user()->combos()->create([
            'fighter' => $request->キャラクター,
            'damage' => $request->ダメージ,
            'version' => $request->version,
            'starting' => $request->始動技,
            'counter_hit' =>$request->counter_hit,
            'place' => $request->状況,
            'magic_circuit' => $request->magic_circuit,
            'moon' => $request->moon,
            'recipe' => $request->コンボレシピ,
            'explain' => $request->explain,
            'video' => $request->動画,
            'difficulty' => $request->コンボ難易度,
            'words' => $request->一言コメント,
        ]);
    
        return redirect()->route('users.adoptions_index', ['id' => $request->user()->id])->with('is_after_complete', '完了しました');
    }

    public function destroy($id)
    {
        $combo = Combo::find($id);

        if (\Auth::id() === $combo->user_id) {
            $combo->delete();
        }

        return back();
    }

    public function combo_post()
    {
        return view('combos.combo_post');
    }

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

        $combos = $query->sortable()->orderBy('created_at', 'desc')->paginate(10);

        $user = \Auth::user();
        $data = [
            'user' => $user,
            'combos' => $combos,
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

        $combos = $query->orderBy('created_at', 'desc')->paginate(10);

        $user = User::find($request->user_id);

        $data = [
            'user' => $user,
            'combos' => $combos,
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

        $combos = $query->orderBy('created_at', 'desc')->paginate(10);

        $user = User::find($request->user_id);

        $data = [
            'user' => $user,
            'combos' => $combos,
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

        $combos = $query->orderBy('created_at', 'desc')->paginate(10);

        $user = User::find($request->user_id);

        $data = [
            'user' => $user,
            'combos' => $combos,
        ];

        return view('users.mycombos', $data);
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('commons.about');
    }
}