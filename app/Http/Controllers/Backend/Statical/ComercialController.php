<?php

namespace Diboxadmin\Http\Controllers\Backend\Statical;

use Illuminate\Http\Request;
use Diboxadmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;


class ComercialController extends Controller
{
    public function getProviders()
    {
        return view('backend.comercial.providers');
    }
    
    public function getResellers()
    {
        return view('backend.comercial.resellers');
    }
    
    public function getServices()
    {
        return view('backend.comercial.services');
    }
    
    public function getPacks()
    {
        return view('backend.comercial.packs');
    }
    
    public function getProducts()
    {
        return view('backend.comercial.products');
    }
    
    public function getCustomers()
    {
        return view('backend.comercial.customers');
    }
}
