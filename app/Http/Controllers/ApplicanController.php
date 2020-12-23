<?php

namespace App\Http\Controllers;
use App\Rules;
use App\applican;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;


class ApplicanController extends Controller
{

    public function create(Request $request){

        $this->ValidationRequest($request);

        if ($request->hasFile('image')) {
            $file = $request->file('image') ;
            $ext = $file->getClientOriginalExtension() ;
            $filename = 'cover_image' . '_' . time() . '.' . $ext ;
            $file->storeAs('public/coverImages', $filename);
        } else {

            $filename = 'noimage.png';
        }

//        dd($filename);
        applican::create([
            "name"        => $request->name,
            "email"       =>$request->email,
            "address"     =>$request->address,
            "NID"         =>$request->NID,
            "mobile"      => $request->mobile,
            "image"       => $filename,
        ]);
        return redirect('allApplicans');
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

        return view('applicants.all-applicants', [
            "x" => $user
        ]);
    }

    public function single($id){
        $x = applican::where('applicantID', $id)->get()->first();

        return view('applicants.single-applicant', [
            "user"=>$x
        ]);
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }

}
