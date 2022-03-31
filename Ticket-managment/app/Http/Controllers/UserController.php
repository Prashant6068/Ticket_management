<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'uname' => 'required|email|unique:users,email,',
                'mobile' => 'required|regex:/^[6-9]\d{9}$/u',
                'firstname' => 'required|min:5|max:15',
                'lastname' => 'nullable|min:5|max:15',
                'pic' => 'required|mimes:png,jpg,jpeg',
                'role' => 'required'
            ],
            [
                'uname.required' => '*Username is required',
                'mobile.required' => '*Phone no is required',
                'firstname.required' => '*Firstname is required',
                'role.required' => '*role is required',
                'pic.required' => '*Image is required',
                'pic.mimes' => '*Only jpg,png files are allowed'
            ]
        );
        // Upload Image
        if ($request->hasfile('pic')) {
            $fileName = $request->file('pic');
            $fn = rand() . time() . '.' . $fileName->extension();
            $fileName->move(public_path('images/'), $fn);
        }
        if (empty($request->status)) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }
        if ($request->role === "subadmin" || $request->role === "agent")
            $password = ucwords($request->firstname) . "@1234";
        if ($request->role === "user")
            $password = "User@1234";
        User::create([
            'email' => $request->uname,
            'mobile' => $request->mobile,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'role' => $request->role,
            'profile_pic' => $fn,
            'status' => $status,
            'password' => Hash::make($password)
        ]);
        $details = [
            "uname" => $request->uname,
            "password" => $password
        ];
        Mail::to($request->uname)->send(new RegisterMail($details));
        return redirect('/users')->with('msg', "User create successfully");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'uname' => 'required|email',
                'mobile' => 'required|regex:/^[6-9]\d{9}$/u',
                'firstname' => 'required|min:5|max:15',
                'lastname' => 'nullable|min:5|max:15',
                'pic' => 'mimes:jpg,png,jpeg,gif',
                'role' => 'required',
            ],
            [
                'uname.required' => '*Username is required',
                'mobile.required' => '*Phone no is required',
                'firstname.required' => '*Firstname is required',
                'role.required' => '*role is required',
                'pic.required' => '*Image is required',
                'pic.mimes' => '*Only jpg,png files are allowed'
            ]
        );
        // Upload Image
        $fn = $request->current_image;
        if ($request->hasfile('pic')) {
            $fileName = $request->file('pic');
            $fn = rand() . time() . '.' . $fileName->extension();
            if ($fileName->move(public_path('images/'), $fn)) {
                $dest = 'images/' . $request->current_image;
                if (File::exists($dest)) {
                    File::delete($dest);
                }
            }
        }
        if (empty($request->status)) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }
        User::where('id', $id)->update([
            'email' => $request->uname,
            'mobile' => $request->mobile,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'role' => $request->role,
            'profile_pic' => $fn,
            'status' => $status
        ]);
        return redirect('/users')->with('msg', "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('error', "User deleted successfully");
    }
}
