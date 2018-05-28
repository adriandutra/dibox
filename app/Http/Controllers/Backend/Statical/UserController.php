<?php

namespace Diboxadmin\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Diboxadmin\User;
use Diboxadmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;

class UserController extends Controller
{    
    public function getList()
    {       
       return view('backend.system.users');
    }
    
    public function getNotify()
    {
        return view('backend.system.mailing');
    }
    
    public function getFtpUser()
    {
        return view('backend.system.ftpuser');
    }
}
