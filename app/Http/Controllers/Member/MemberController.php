<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }
    public function index()
    {
        // Mengambil data transaction camp berdasarkan user id yang login
        $data = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        return view('member.dashboard', compact('data'));
    }
}
