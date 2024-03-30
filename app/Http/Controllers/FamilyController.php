<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{HeadOfFamilyModel,FamilyMemberModel,PincodeModel};
// use App\Models\;
// use App\Models\;
use Illuminate\Support\Facades\Crypt;
use Exception;
use Log;

class FamilyController extends Controller
{
    //
    public function index($id ="")  {
        try {
          if($id == ""){
            $data = HeadOfFamilyModel::all();
            $pincodes = PincodeModel::all();
            return view('saveFamilyDetail',compact('data','pincodes'));
          }else{
            $id = Crypt::decrypt($id);
            $dada = HeadOfFamilyModel::find($id);
           
            $familyMember = HeadOfFamilyModel::find($id)->familyMembers;
            
            return view('familyDetail',compact('dada','familyMember'));
          }
           
        } catch (Exception $th) {
            //throw $th;
        }
    }
    
    public function save1(Request $request)
    {
            $request->validate([
                'file' => 'required|mimes:jpg,png,doc,docx,pdf,ppt,zip|max:100240',
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required',
                'bdate' => 'required|date|before:-21 years',
                'marital_sts' => 'required',
                'address' => 'required',
                'pincode' => 'required',
                'city' => 'required',
                'state' => 'required',
                'hobby' => 'required',
            ]);
                $headOfFamily = new HeadOfFamilyModel;
                $fileName = "";
                if ($files = $request->file('file')) {
                    $fileName = time().'.'.$request->file->extension();
                    $f = $request->file->getClientOriginalName();
                    $request->file->move(public_path('file'), $fileName);
                }
            
                $headOfFamily->fname = $request->fname;
                $headOfFamily->lname = $request->lname;
                $headOfFamily->phone = $request->phone;
                $headOfFamily->bdate = $request->bdate;
                $headOfFamily->marital_sts = $request->marital_sts;
                $headOfFamily->address = $request->address;
                $headOfFamily->pincode = $request->pincode;
                $headOfFamily->city = $request->city;
                $headOfFamily->state = $request->state;
                $headOfFamily->hobbies = json_encode($request->hobby);
                $headOfFamily->photo = $fileName;
                $memberCount = !empty($request->fmfname) ? sizeof($request->fmfname) : 0;
                $headOfFamily->member_count = $memberCount;
                $headOfFamily->save();

                if ( $memberCount > 0) {
                    for ($i=0; $i < $memberCount; $i++) { 
                        $familyMember = new FamilyMemberModel;
                        $familyMember->head_id = $headOfFamily->id;
                        $familyMember->fname = $request->fmfname[$i];
                        $familyMember->lname = $request->fmlname[$i];
                        $familyMember->education = $request->education[$i];
                        $familyMember->bdate = $request->fmbdate[$i];
                        $familyMember->marital_sts = $request->fmfmarital_sts[$i+1];
                        $familyMember->save();
                    }
                }
                return redirect()->route('home')
                        ->with('success','Family created successfully');
       
    }
}
