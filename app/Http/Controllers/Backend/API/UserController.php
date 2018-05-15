<?php

namespace Diboxadmin\Http\Controllers\Backend\API;


use Illuminate\Http\Request;
use Diboxadmin\Http\Controllers\Controller;
use Diboxadmin\Helpers\ApiResponse;
use Diboxadmin\Helpers\ModelResponse;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Event;
use Log;
use DB;


class UserController extends Controller
{
    public function getList()
    {
      try {
            
            $users = DB::table('crm_user')
                        ->Select(DB::raw('i_user as id
                                         , fullname 
                                         , user 
                                         , email 
                                         , expiration_date
                                         , active'))                                         
                        ->get();
           
                        
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Users Table';
            $r->data = $users;
            return $r->doResponse();
            
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getNotify()
    {
        try {
            
            $users = DB::table('crm_emails')
                       ->Select(DB::raw('i_email as id
                                         , name
                                         , email
                                         , active'))
                       ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Notify Response';
            $r->data = $users;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getFtpUser()
    {
        try {
            
            $users = DB::table('cms_ftpuser')
                        ->Select(DB::raw('id
                                         , userid
                                         , homedir
                                         , accessed
                                         , modified
                                         , active'))
                        ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'FTP User Response';
            $r->data = $users;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
