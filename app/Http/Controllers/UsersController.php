<?php

namespace App\Http\Controllers;

use App\Combo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function adoptions_index($id)
    {
        $user = User::find($id);
        if($user == null){
            return view('errors.404');
        }
        $count_hits = count($combos = $user->adopts()->get());
        $combos = $user->adopts()->sortable()->orderBy('created_at', 'desc')->paginate(10);

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
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
            'count_hits' => $count_hits,
        ];

        $data += $this->counts($user);
        
        return view('users.adoptions_index', $data);
    }

    public function favorites_index($id){

        $user = User::find($id);
        if($user == null){
            return redirect()->route('top_page');
        }
        $count_hits = count($user->favorites()->get());
        $combos = $user->favorites()->sortable()->orderBy('created_at', 'desc')->paginate(10);

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
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
            'count_hits' => $count_hits,
        ];

        $data += $this->counts($user);

        return view('users.favorites_index', $data);
    }

    public function mycombos($id){

        $user = User::find($id);
        if($user == null){
            return redirect()->route('top_page');
        }
        $count_hits = count($user->combos()->get());
        $combos = $user->combos()->sortable()->orderBy('created_at', 'desc')->paginate(10);

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
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
            'count_hits' => $count_hits,
        ];

        $data += $this->counts($user);

        return view('users.mycombos', $data);
    }

    public function edit()
    {   
        $user = Auth::user();

        $countAdopted = 0;
        $countFavorited = 0;
        $countUserStatusCombos = $user->combos()->get();
        
        foreach($countUserStatusCombos as $countUserStatusCombo){
            $countAdopted += $countUserStatusCombo->adoption_count;
            $countFavorited += $countUserStatusCombo->favorite_count;
        }

        $data = [
            'user' => $user,
            'count_adopted' => $countAdopted,
            'count_favorited' => $countFavorited,
        ];

        $data += $this->counts($user);

        return view('users.edit', $data);
    }

    public function update(Request $request)
    {   
        $id = Auth::id();
        $this->validate($request, [
            'main_character' => 'required|string|',
            'platform' => 'required',
            'platform.*' => ['string','regex:/[PS4]|[Switch]|[Steam]/'],
        ]);
        
        User::find($id)->update([
            'main_character' => $request->main_character,
            'platform' => $request->platform,
        ]);

        return redirect()->route('users.adoptions_index', ['id' => $id])->with('is_after_complete', '完了しました');
    }

    public function user_serch(Request $request)
    {
        $query = User::query();
        $serch_user = $request->input('user_name');
        $pat = '%' . addcslashes($serch_user, '%_\\') . '%';

        if($serch_user != ''){
            $query->where('name', 'LIKE', $pat);
        }

        $count_users_hits = count($query->get());
        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'users' => $users,
            'old' => $request->$serch_user,
            'count_users_hits' => $count_users_hits,
        ];

        return view('users.user_serch', $data);
    }
}   
