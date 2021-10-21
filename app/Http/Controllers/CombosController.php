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
        $count_hits = count($combos);
        $combos = Combo::sortable()->orderBy('created_at', 'desc')->paginate(10);
        $user = \Auth::user();

        $data = [
            'user' => $user,
            'combos' => $combos,
            'count_hits' => $count_hits,
        ];

        return view('combos.index', $data);
    }

    public function store(Request $request)
    {   
        $fighter = $request->キャラクター;
        $this->validate($request, [
            'キャラクター' => 'required|string|',
            'ダメージ' => 'integer|nullable|digits_between:1,4',
            'version' => 'required|string|',
            '始動技' => 'required|string|',
            'counter_hit' => 'required|string|',
            '状況' => 'required|string|max:8|',
            'magic_circuit' => 'required|integer|',
            'moon' => 'required|integer|',
            'コンボレシピ' => 'required|string|max:200|min:5|regex:/.>.+/|unique:combos,recipe,NULL,id,fighter,' . $fighter,
            'explain' => 'string|max:200|nullable|',
            '動画' => 'string|max:200|nullable|url|',
            'コンボ難易度' => 'required|string|',
            'タグ' => 'required|string|max:30|',
        ]);

        $new_damage = $request->ダメージ;
        if ($new_damage == null){
            $new_damage = 0;
        }

        $request->user()->combos()->create([
            'user_name' => $request->user()->name,
            'fighter' => $request->キャラクター,
            'damage' => $new_damage,
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
            'words' => $request->タグ,
        ]);
    
        return redirect()->route('users.mycombos_index', ['id' => $request->user()->id])->with('is_after_complete', '完了しました');
    }

    public function detail($id)
    {
        $combo = Combo::find($id);
        if($combo == null){
            return \App::abort(404);
        }
        $data =[
            'id' => $id,
            'combo' => $combo,
        ];
        return view('combos.detail',$data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'version' => 'required|string|',
            '始動技' => 'required|string|',
            'explain' => 'string|max:200|nullable|',
            '動画' => 'string|max:200|nullable|url|',
            'タグ' => 'required|string|max:30|',
            'ダメージ' => 'integer|nullable|digits_between:1,4',
        ]);
        
        $combo = Combo::find($request->id);

        $new_damage = $request->ダメージ;
        if ($new_damage == null){
            $new_damage = 0;
        }

        if (\Auth::id() === $combo->user_id){
            $combo->update([
                'version' => $request->version,
                'starting' => $request->始動技,
                'explain' => $request->explain,
                'video' => $request->動画,
                'words' => $request->タグ,
                'damage' => $new_damage,
            ]);
        }

        return redirect()->route('users.combos.detail', ['id' => $request->id])->with('is_after_complete', '完了しました');
    }

    public function destroy($id)
    {
        $combo = Combo::find($id);

        if (\Auth::id() === $combo->user_id) {
            $combo->delete();
        }

        return back();
    }

    public function report($id)
    {
        $combo = Combo::find($id);
        $reported_count = $combo->reported_count;
        $reported_count += 1;
        $combo->update([
            'reported_count' => $reported_count,
        ]);

        return back()->with('is_after_complete', '完了しました');
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

    public function rulues()
    {
        return view('commons.rules');
    }

    public function arcade()
    {
        return view('commons.arcade');
    }
}