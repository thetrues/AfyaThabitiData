<?php
use App\Models\LocalSession;
use Illuminate\Support\Facades\Session;

class SessionService
{
    public function getSession()
    {
        return  LocalSession::all();
    }
}
