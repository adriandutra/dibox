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

class ComercialController extends Controller
{
    public function getProviders()
    {
        try {
            
            $providers = DB::table('cms_content_provider')
                             ->Select(DB::raw('i_provider as id
                                             , name
                                             , tag
                                             , active'))
                             ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Providers Response';
            $r->data = $providers;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getResellers()
    {
        try {
            
            $users = DB::table('cms_content_provider')
                        ->Select(DB::raw('i_provider as id
                                         , name
                                         , tag
                                         , active'))
                                         ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Resellers Response';
            $r->data = $users;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getCustomers()
    {
        try {
            
                $customers = DB::table('customer_info as ci')
                                ->Select(DB::raw('ci.i_customer as id
                                                  , ci.*
                                                  , cd.*'))
                                ->join(DB::raw('customer_date_info as cd'), 'cd.i_customer', '=', 'ci.i_customer')
                                ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Customers Response';
            $r->data = $customers;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
