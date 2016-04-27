<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

class MemberController extends Controller
{
    protected $member = null;
    
    public function __construct(\App\Member $member) {
        $this->member = $member;
    }
    
    public function allMembers()
    {
        return Response::Json($this->member->allMembers(), 200);
    }
    
    public function getMember($id)
    {
        $member = $this->member->getMember($id);
        if(!$member){
            return Response::Json(['response' => 'Membro não encontrado.'], 400);
        }
        return Response::Json($member, 200);
        
    }
    
    public function saveMember()
    {
        return Response::Json($this->member->saveMember(), 200);
    }
    
    public function updateMember($id)
    {
        $member = $this->member->updateMember($id);
        if(!$member){
            return Response::Json(['response' => 'Membro não encontrado.'], 400);
        }
        return Response::Json($member, 200);
    }
    
    public function deleteMember($id)
    {
        $member = $this->member->deleteMember($id);
        if(!$member){
            return Response::Json(['response' => 'Membro não encontrado.'], 400);
        }
        return Response::Json('Membro removido com sucesso.', 200);        
    }    
}
