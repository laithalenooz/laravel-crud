<?php

namespace App\Http\Controllers;

use App\admins;
use App\Rules;
use App\applican;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;


class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function create(){

        applican::create([
            "name"        => $request->name,
            "email"       =>$request->email,
            "address"     =>$request->address,
            "NID"         =>$request->NID,
            "image"       => $filename,
        ]);
    }

    public function ValidationRequest($request){

        $request->validate([
            'NID'      => 'required|min:10|max:10',
            'name'     => 'required|regex:/^[\w]+\s[\w]+\s[\w]+\s[\w]+/',
            'email'    => 'required|email',
            'address'  => 'required',
            'mobile'   => 'required|min:10|max:10',
        ]);

    }

    public function show(){
        $user = applican::all();

        return view('admin.admin-table', [
            "x" => $user
        ]);
    }

    public function single($id){
        $AllUsers = applican::where('applicantID', $id)->get()->first();

        return view('admin.view', [
            "user"=>$AllUsers
        ]);
    }

    public function edit(){

    }

    public function update(Request $request, $id){

        $this->ValidationRequest($request);

        if ($request->hasFile('image')) {
            $file = $request->file('image') ;
            $ext = $file->getClientOriginalExtension() ;
            $filename = 'cover_image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/coverImages', $filename);

        }  else {

            $filename = 'noimage.png';
        }
//        dd($filename);

        applican::where('applicantID', $id)->update([
            "name"        => $request->name,
            "email"       => $request->email,
            "NID"         => $request->NID,
            "address"     => $request->address,
            "mobile"      => $request->mobile,
            "image"       => $filename,
        ]);

//        return "done";
        return redirect('/admin');
    }

    public function destroy($id){
        applican::where('applicantID', $id)->delete();

        return redirect('admin');
    }
}
