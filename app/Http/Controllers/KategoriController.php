<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori as model;
use DB;

class KategoriController extends Controller
{
    public function index()
    {
    	$kategori = Kategori::orderBy('id','DESC')->paginate(5);
    	return view('kategoris.table')
    }
}
