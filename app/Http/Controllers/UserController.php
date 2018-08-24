<?php

namespace App\Http\Controllers;

use App\User;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        return view('user.index', compact('users'));
    }
    
    public function index_json()
    {
        $users = DB::select('select users.* , p.number, p.organization from users join phones as p on p.user_id = users.id');

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::create(['name' => $request['name_user']]);
        $phone = Phone::create(['number' => $request['number'], 'organization' => $request['name_organization'], 'user_id' => $user->id]);
        return redirect()->action('UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users= User::findOrFail($id);
        $ph = $users->phone;

        return response()->json($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['name' => $request['name_user']]);
 
        $phone = Phone::where('user_id', $id);
        $phone->update(['number' => $request['number'], 'organization' => $request['name_organization']]);
  
        return redirect()->action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $phone = Phone::where('user_id', $id);
        $phone->delete();
        $user->delete();
        
        return redirect()->action('UserController@index');
    }
}
