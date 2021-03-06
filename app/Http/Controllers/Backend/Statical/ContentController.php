<?php

namespace Diboxadmin\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Diboxadmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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
    
    public function getMediaImages()
    {
        return view('backend.content.mediaimages.mediaimages');
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
        return view('backend.content.listseries.listseries');
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
