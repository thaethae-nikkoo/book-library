<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function librarians()
    {
        return view('librarians', [
            'members' => User::latest()->where('role', 'librarian')->get()
        ]);
    }
    public function members()
    {
        return view('members', [
            'members' => User::latest()->where('role', 'member')->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = $request->validate([
            'name' => ['required' , 'min:3' , 'max:255'],
            'email' => ['required' , 'min:3' , 'max:255' , Rule::unique('users', 'email')],
            'password' => ['required' , 'min:6' , 'max:255'],
            'address' => ['required' , 'min:6' , 'max:255'],
            'phone' => ['required' , 'min:5' , 'max:255'],
            'role' => ['required'],

         ]);

        $avatar = $request->file('avatar');

        $file_name = time() . '-' . str_replace(' ', '-', $avatar->getClientOriginalName());

        $member['avatar'] = $avatar->storeAs('/avatars', $file_name);

        $member['password'] = Hash::make($request->password);

        User::create($member);

        if($request->role == 'member') {
            return redirect(url('/get-members'));
        } elseif($request->role == 'librarian') {
            return redirect(url('/get-librarians'));

        } else {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('member', [
         'user'  =>   User::where('id', $id)->first(),
         'histories'  =>   History::where('member_id', $id)->with('author', 'book')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('editLibrarian', [
           'user' =>  User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = $request->validate([
           'name' => ['required' , 'min:3' , 'max:255'],
           'email' => ['required' , 'min:3' , 'max:255' , Rule::unique('users', 'email')->ignore($id)],
           'address' => ['required' , 'min:6' , 'max:255'],
           'phone' => ['required' , 'min:5' , 'max:255'],
           'role' => ['required'],

        ]);


        if($request->new_avatar) {

            $old_avatar = $request->old_avatar;

            if (Storage::disk('public')->exists($old_avatar)) {
                // Delete the file
                Storage::disk('public')->delete($old_avatar);
            }

            $avatar = $request->file('new_avatar');
            $file_name = time() . '-' . str_replace(' ', '-', $avatar->getClientOriginalName());
            $member['avatar'] = $avatar->storeAs('/avatars', $file_name);

        }

        User::where('id', $id)->update($member);
        if($request->role == 'member') {

            return redirect(url('/get-members'));
        } elseif($request->role == 'librarian') {
            return redirect(url('/get-librarians'))->with('success', 'User update');

        } else {
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User Deleted');
    }
}
