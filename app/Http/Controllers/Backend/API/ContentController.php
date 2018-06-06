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
    
    public function getMetadata()
    {
        try {
            
            $metadata = DB::table('cms_activemetadata')
                        ->Select(DB::raw('cms_activemetadata.title
                                          ,cms_activemetadata.i_data
                                          ,cms_activemetadata.uid
                                          ,cms_activemetadata.title
                                          ,cms_activemetadata.genre
                                          ,cms_ratingmetadata.average_rating
                                          ,cms_ratingmetadata.rating_number
                                          ,cms_activemetadata.image
                                          ,cms_activemetadata.trailer
                                          ,cms_activemetadata.media
                                          ,cms_activemetadata.last_update
                                          ,cms_activemetadata.active
                                          ,cms_activemetadata.syncthing
                                          ,cms_activemetadata.trash
                                          ,cms_activemetadata.active
                                          ,cms_activemetadata.expiration_date'))
                        ->leftjoin('cms_ratingmetadata','cms_activemetadata.uid','=','cms_ratingmetadata.rating_uid')
                        ->get();
                                             
                                             
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Metadata response';
            $r->data = $metadata;
            return $r->doResponse();
                                             
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getMediaImages()
    {
        try {
            
            $images = DB::table('cms_mediaimages')
                            ->Select(DB::raw('cms_mediaimages.i_image as id 
                                             , cms_mediaimages.uid as uid
                                             , cms_metadata.title  as title                                           
                                             , cms_mediaimages.name as name
                                             , cms_mediaimages.type as type
                                             , CONCAT(\'<img src="https://api.dibox.com.ar:8083/image/vodbyiimage/\',cms_mediaimages.i_image, \'/100/100/" style="max-width:100px; max-height:100px;"/>\') as file
                                             , cms_mediaimages.active as active'))
                            ->leftjoin('cms_metadata','cms_metadata.uid','=','cms_mediaimages.uid')
                            ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Images response';
            $r->data = $images;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getOutstandingList()
    {
        try {
            
            $outstand = DB::table('cms_activecontent')
                        ->Select(DB::raw('cms_activecontent.i_data as id
                                         , ifnull(cms_outstanding.i_outstanding,0) as active
                                         , cms_activecontent.uid 
                                         , cms_activecontent.title
                                         , cms_activecontent.directors
                                         , cms_activecontent.actors'))
                        ->leftjoin('cms_outstanding', 'cms_activecontent.uid','=','cms_outstanding.uid')
                        ->get();
                                        
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'OutstandingList response';
            $r->data = $outstand;
            return $r->doResponse();
                                        
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getCategoryList()
    {
        try {
            
                $categories  = DB::table('cms_category')
                                 ->Select(DB::raw('i_category as id
                                                   , name
                                                   , description
                                                   , TO_BASE64(file) as file
                                                   , active'))
                                 ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Categories response';
            $r->data = $categories;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getSeries()
    {
        try {
            
            $series = DB::table('cms_series')
                         ->Select(DB::raw('i_data as id
                                        , sid
                                        , title
                                        , year
                                        , TO_BASE64(file) as file
                                        , last_update
                                        , active'))
                         ->get();
                      
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Series response';
            $r->data = $series;
            return $r->doResponse();
                                             
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getMusicGenres()
    {
        try {
            
            $music  = DB::table('cms_music_genres')
                            ->Select(DB::raw('i_genre as id
                                             , name
                                             , active'))
                            ->get();
                                                   
                                                   
           $r = new ModelResponse();
           $r->success = true;
           $r->message = 'Categories response';
           $r->data = $music;
           return $r->doResponse();
                                                   
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    
    public function getAdvertisingList()
    {
        try {
            
            $ads  = DB::table('cms_advertising')
                          ->Select(DB::raw('cms_advertising.i_add as id
                                          , cms_advertising.name as name
                                          , cms_advertising.description as description
                                          , TO_BASE64(cms_advertising.file) as file
                                          , cms_advertising.mime as mime
                                          , cms_advertising.url url
                                          , cms_advertising.date_added as date_added
                                          , cms_advertising.trash as trash
                                          , cms_advertising.active as active
                                          , crm_reseller.name as name_reseller'))
                          ->leftjoin('crm_reseller','cms_advertising.i_reseller','=','crm_reseller.i_reseller')
                          ->get();
                          
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Ads response';
            $r->data = $ads;
            return $r->doResponse();
                                             
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getListVodHls()
    {
        try {
            
            $vod    = DB::table('cms_vodhls')
                           ->Select(DB::raw('i_vod as id
                                             , uid
                                             , name
                                             , hls
                                             , active'))
                           ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Vod response';
            $r->data = $vod;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
    
    public function getTrailers()
    {
        try {
            
            $trailers = DB::table('cms_trailers')
                        ->Select(DB::raw('i_trailer as id
                                         , uid
                                         , name
                                         , hls 
                                         , active'))
                        ->get();
                                         
                                         
            $r = new ModelResponse();
            $r->success = true;
            $r->message = 'Trailer response';
            $r->data = $trailers;
            return $r->doResponse();
                                         
        } catch(\Exception $e){
            $r = new ApiResponse();
            $r->success = false;
            $r->message = $e->getMessage();
            return $r->doResponse();
        }
    }
}
