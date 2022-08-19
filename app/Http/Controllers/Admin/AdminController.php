<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    //
    public function index()
    {

        $data = Checkout::with('Camp')->get();
        return view('admin.dashboard', compact('data'));
    }
}
