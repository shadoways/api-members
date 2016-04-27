<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class Member extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'phone', 'birth', 'status'];
    protected $hidden = ['password'];
    
    public function allMembers()
    {
        return self::all();
    }
    
    public function saveMember()
    {
        $input = Input::all();
        $input['password'] = Hash::make($input['password']);
        $member = new Member();
        $member->fill($input);
        $member->save();
        
        return $member;
    }
    
    public function getMember($id)
    {
        $member = self::find($id);
        if(is_null($member)){
            return false;
        }
        return $member;
    }
    
    public function updateMember($id)
    {
        $member = self::find($id);
        if(is_null($member)){
            return false;
        }
        $input = Input::all();
        $member->fill($input);
        $member->save();
        
        return $member;
    }
    
    public function deleteMember($id)
    {
        $member = self::find($id);
        if(is_null($member)){
            return false;
        }
        return $member->delete();
    }
}
