<?php

namespace Diboxadmin\Http\Controllers\Backend\Statical;


use Illuminate\Http\Request;
use Diboxadmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;


class CdnController extends Controller
{
    public function getMediaServers(Request $request)
    {
        return view('backend.cdn.mediaservers');
    }
    
    public function getPops(Request $request)
    {
        return view('backend.cdn.pops');
    }
    
}