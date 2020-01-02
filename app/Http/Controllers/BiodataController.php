<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BioData;

class BiodataController extends Controller
{

    public function addBioData(){
        return view('BioData.addBioData');
    }

    public function saveBioData(Request $request){
       // dd($request->all());
        $data = new BioData;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->interested_in = serialize($request->interested_in);
        $data->state = $request->state;
        // $data->photo = $request->photo;
        $data->address = $request->address;
        if($file = $request->hasFile('photo')){

            $file = $request->file('photo');

            $fileName = $file->getClientOriginalName();
            $path = public_path().'/images/';
            $file->move($path,$fileName);
            $data->photo = '/public/images/'.$fileName;

        }
        //dd($data);
        $data->save();
        return back()->with('success','Bio Data Added Successfully');
    }

    public function showBioData(){
        $data = BioData::orderBy('created_at', 'DESC')->get();
        return view('BioData.showBioData', compact('data'));
    }

    public function editBioData($id){
        $data = BioData::where('id','=',$id)->first();
        //dd($data);
        return view('BioData.editBioData', compact('data'));
    }

    public function updateBioData(Request $request, $id){
        $data = BioData::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->interested_in = serialize($request->interested_in);
        $data->state = $request->state;
        $data->address = $request->address;
        if($file = $request->hasFile('photo')){

            $file = $request->file('photo');

            $fileName = $file->getClientOriginalName();
            $path = public_path().'/images/';
            $file->move($path,$fileName);
            $data->photo = '/public/images/'.$fileName;

        }
        //dd($data);
        $data->save();
        return back()->with('success','Bio-Data Updated Successfully');
    }

    public function deleteBioData(){
//
    }

}
