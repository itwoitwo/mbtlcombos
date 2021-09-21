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
            'コンボレシピ' => 'required|string|max:191|min:5|regex:/.>.+/|',
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

    public function welcome()
    {   
        if(\Auth::check()){
            return redirect()->route('combos.index');
        }
        return view('welcome');
    }

    public function top_page()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('commons.about');
    }
}