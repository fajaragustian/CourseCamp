<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function profile(Request $request)
    {
        $data = Auth::check() ? Auth::id() : true;
        return view('Member.profile.editprofile', compact('data'));
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:50",
            "email" => "required|email",
            "occupation" => "required|string",
            "phone" => "required|numeric|digits_between:8,13",
            "address" => "required|string|max:255",
            "bio" => "required|string|max:255",
            "avatar" => "image|mimes:jpg,png,jpeg,gif,svg|max:1048",
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->occupation = $request->occupation;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->bio = $request->bio;
        if ($request->hasFile('avatar')) {
            // delete old photo  => path:storage/profile/profile_6221cecf36ad9.jpg
            $subStrPhotoName = Str::substr($user->avatar, 16);
            Storage::delete('public/avatar/' . $subStrPhotoName);

            // create new photo
            $dir = "storage/avatar";
            $newName = "avatar_" . uniqid() . "." . $request->file('avatar')->extension();
            $request->file('avatar')->storeAs("public/avatar", $newName);
            $user->avatar = $dir . "/" . $newName;
        }
        // return $user;
        $user->update();
        return redirect()->back()->with('success', 'Success Update Profile');
    }
    public function changePassword()
    {
        return view("Member.profile.changepassword");
    }
    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords not matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }
}
