<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function adoptions_index($id)
    {
        $user = User::find($id);
        $combos = $user->adopts()->sortable()->orderBy('created_at', 'desc')->paginate(5);

        $data = [
            'user' => $user,
            'combos' => $combos,
        ];

        $data += $this->counts($user);
        
        
        return view('users.adoptions_index', $data);
    }

    public function favorites_index($id){

        $user = User::find($id);
        $combos = $user->favorites()->sortable()->orderBy('created_at', 'desc')->paginate(5);

        $data = [
            'user' =>$user,
            'combos' => $combos,
            ];

        return view('users.favorites_index', $data);
    }

    public function mycombos($id){

        $user = User::find($id);
        $combos = $user->combos()->sortable()->orderBy('created_at', 'desc')->paginate(5);

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
}   
