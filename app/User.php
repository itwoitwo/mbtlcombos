<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login_id', 'password','main_character','platform',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function combos()
    {
        return $this->hasMany(Combo::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Combo::class, 'favorites', 'user_id', 'combo_id')->withTimestamps();
    }

    public function favorite($comboId)
    {
        //既にお気に入りかどうかの確認
        $exist = $this->is_favoring($comboId);
        
        if($exist){
            return false;
        } else {
            $this->favorites()->attach($comboId);
            $favorite_count = Combo::find($comboId)->favorite_count;
            $favorite_count += 1;
            Combo::find($comboId)->update(['favorite_count' => $favorite_count]);

            return true;
        }
    }

    public function unfavorite($comboId)
    {
        //既にお気に入りかどうかの確認
        $exist = $this->is_favoring($comboId);
        
        if($exist){
            $this->favorites()->detach($comboId);
            $favorite_count = Combo::find($comboId)->favorite_count;
            $favorite_count -= 1;
            if ($favorite_count >= 0){
                Combo::find($comboId)->update(['favorite_count' => $favorite_count]);
            }
        } else {
            return false;
        }
    }
    
    public function is_favoring($comboId)
    {
        return $this->favorites()->where('combo_id', $comboId)->exists();
    }
    
    public function adopts()
    {
        return $this->belongsToMany(Combo::class, 'adopts', 'user_id', 'combo_id')->withTimestamps();
    }

    public function adopt($comboId)
    {
        //既にお気に入りかどうかの確認
        $exist = $this->is_adopting($comboId);
        
        if($exist){
            return false;
        } else {
            $this->adopts()->attach($comboId);
            $adoption_count = Combo::find($comboId)->adoption_count;
            $adoption_count += 1;
            Combo::find($comboId)->update(['adoption_count' => $adoption_count]);
            return true;
        }
    }

    public function unadopt($comboId)
    {
        //既にお気に入りかどうかの確認
        $exist = $this->is_adopting($comboId);
        
        if($exist){
            $this->adopts()->detach($comboId);
            $adoption_count = Combo::find($comboId)->adoption_count;
            $adoption_count -= 1;
            if ($adoption_count >= 0){
                Combo::find($comboId)->update(['adoption_count' => $adoption_count]);
            }
        } else {
            return false;
        }
    }
    
    public function is_adopting($comboId)
    {
        return $this->adopts()->where('combo_id', $comboId)->exists();
    }

}
