<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function adopts_index($id)
    {
        $user = User::find($id);
        $combos = $user->adopts()->sortable()->orderBy('created_at', 'desc')->paginate(1);

        $data = [
            'user' => $user,
            'combos' => $combos,
        ];

        $data += $this->counts($user);
        
        
        return view('users.show', $data);
    }

    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites();
        
        $data = [
            'user' =>$user,
            'favorites' => $favorites,
            ];
            
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }

    public function favorites_index($id){

        $user = User::find($id);
        $combos = $user->favorites()->sortable()->orderBy('created_at', 'desc')->paginate(1);

        $data = [
            'user' =>$user,
            'combos' => $combos,
            ];

        return view('users.favorites_index', $data);
    }

    public function mycombos($id){

        $user = User::find($id);
        $combos = $user->combos()->sortable()->orderBy('created_at', 'desc')->paginate(1);

        $data = [
            'user' => $user,
            'combos' => $combos,
        ];

        return view('users.mycombos', $data);
    }

    public function edit($id)
    {   
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];

        return view('users.edit', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'main_character' => 'required|string|',
            'platform' => 'required|string|max:20|',
        ]);
        
        User::find($request->user_id)->update([
            'main_character' => $request->main_character,
            'platform' => $request->platform,
        ]);

        return redirect()->route('users.adopts_index', ['id' => $request->user_id])->with('is_after_complete', '完了しました');
    }
}   
