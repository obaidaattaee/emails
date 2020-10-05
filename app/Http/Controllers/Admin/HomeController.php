<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Link;
use App\Models\UserLink;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view("admin.home.index");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function noAccess(Request $request)
    {
        return view("admin.home.no-access");
    }
}
