<?php

namespace App\Http\Controllers\Menthor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenthorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'menthor']);
    }
    //
    public function index()
    {
        return view('Menthor.index');
    }
}
