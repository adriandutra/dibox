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

class ContentController extends Controller
{
   
    public function getApplications()
    {
        try {
            
            $apps  = DB::table('cms_application')
                        ->Select(DB::raw('i_app as id
                                         , name
                                         , description
                                         , url
                                         , TO_BASE64(file) as file
                                         , active'))
                        ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Applications response';
            $r->data = $apps;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getGenres()
    {
        try {
            
            $genres  = DB::table('cms_genres')
                        ->Select(DB::raw('i_genre as id
                                         , name
                                         , active'))
                        ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Genres response';
            $r->data = $genres;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
}
