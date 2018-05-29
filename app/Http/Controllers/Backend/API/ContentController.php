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
        return view('backend.content.applications.applications');
    }
    
    public function getGenres()
    {
        return view('backend.content.genres.genres');
    }
    
    public function getOrderGenres()
    {
        return view('backend.content.ordergenres.ordergenres');
    }
    
    public function getMetadata()
    {
        return view('backend.content.metadata.metadata');
    }
    
    public function getImages()
    {
        return view('backend.content.images.images');
    }
    
    public function getLive()
    {
        return view('backend.content.live.live');
    }
    
    public function getLive()
    {
        return view('backend.content.live.live');
    }
    public function getLive()
    {
        return view('backend.content.live.live');
    }
    
    public function getLive()
    {
        return view('backend.content.live.live');
    }
    
    public function getLive()
    {
        return view('backend.content.live.live');
    }
    
    public function getNewsList()
    {
        return view('backend.content.newslist.newslist');
    }
    
    public function getSeries()
    {
        return view('backend.content.series.series');
    }
    
    public function getOutstandingList()
    {
        return view('backend.content.outstandinglist.outstandinglist');
    }
    
    public function getCategoryList()
    {
        return view('backend.content.categorylist.categorylist');
    }
    
    public function getCmsTexts()
    {
        return view('backend.content.cmstexts.cmstexts');
    }
    
    public function getMediaAudios()
    {
        return view('backend.content.mediaadios.mediaaudios');
    }
    
    public function getListAudioData()
    {
        return view('backend.content.listaudiodata.listaudiodata');
    }
    
    public function getMusicGenres()
    {
        return view('backend.content.musicgenres.musicgenres');
    }
    
    public function getAdvertisingList()
    {
        return view('backend.content.advertisinglist.advertisinglist');
    }
    
    public function getListVodHls()
    {
        return view('backend.content.listvodhls.listvodhls');
    }
    
    public function getMediaFiles()
    {
        return view('backend.content.mediafiles.mediafiles');
    }
    
    public function getTrailers()
    {
        return view('backend.content.trailers.trailers');
    }
    
}
