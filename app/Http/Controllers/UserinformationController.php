<?php

namespace App\Http\Controllers;

use App\Models\Userinformation;
use Illuminate\Http\Request;

class UserinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Userinformation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'education' => 'required',
            'profile' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => "required",
            'github' => 'required',
            'linkedin' => 'required',
            'skill' => 'require'
        ]);

        return Userinformation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Userinformation::find($id);
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
        $Userinformation = Userinformation::find($id);
        $Userinformation->update($request->all());
        return $Userinformation;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Userinformation::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Userinformation::where('name', 'like', '%'.$name.'%')->get();
    }
}
