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

class CdnController extends Controller
{
    public function getMediaServers()
    {
        try {
            
            $servers = DB::table('cdn_servers')
                       ->Select(DB::raw('i_server as id
                                         , label 
                                         , connections
                                         , mem_free
                                         , mem_used
                                         , mem_percent
                                         , heap_usage                                       
                                         , disk_used
                                         , disk_free
                                         , disk_percent   
                                         , cpu_load           
                                         , cpu_average                                        
                                         , tx 
                                         , rx    
                                         , status
                                         , active'))
                       ->get();
                                         
                                         
           $r = new ModelResponse();
           $r->success = true;
           $r->message = 'Media Servers';
           $r->data = $servers;
           return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getPops()
    {
        try {
            
              $pops  = DB::table('cdn_pops as pop')
                         ->Select(DB::raw('pop.i_pop as id
                                         , pop.name as name    
                                         , res.name as name_reseller
                                         , res.active as active'))
                         ->leftJoin(DB::raw('crm_reseller as res'), 'res.i_reseller', '=', 'pop.i_reseller')
                         ->get();
                                         
                                         
              $r = new ModelResponse();
              $r->success = true;
              $r->message = 'Media Servers';
              $r->data = $pops;
              return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
}
