<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Requests\ReligionRequest;
use App\Http\Resources\ReligionResource;

class ReligionController extends Controller
{
    public function create(ReligionRequest $request){
        try{
            $religion=new Religion();
            $religion->name=$request->name;
            $religion->save();
            return response()->json([
                'data'=>$religion->name,
                'status'=>'Success',
                'message'=>'Religion record created'
            ],201);
        }
        catch(Exception $e){
            return response()->json([
                'message'=>'Religion record not created'
            ],404);
        }
    }
    public function edit(Request $request,Religion $religion){
        try{
            $religion->name = $request->name;
            $religion->save();
            return response()->json([
                "data" => $religion->name, 
                "message" => "Record updated successfully"
            ], 201);
        }catch(Exception $e){
            return response()->json([
                "message" => "Religion record not updated"
            ], 404);
        }
    }
    public function delete(Religion $religion){
        try{
            $religion->delete();
            return response()->json([
                "message"=>"Record deleted successfully"
            ],201);
        }
        catch(Exception $e){
            return response()->json([
                "message"=>"Record not deleted"
            ],404);
        }
    }
    public function select($id){
        $religion=Religion::find($id);
        if($religion == null)
            return response()->json([
                "status"=>"No records found."
            ],404);
        else
            return response()->json([
                "data"=>new ReligionResource($religion)
            ],201);
    }
    public function index(){
        $religion=Religion::all();
        if($religion->isEmpty()){
            return response()->json([
                "data"=>"No records found"
            ],404);
        }
        else{
            return response()->json([
                "data"=>ReligionResource::collection($religion)
            ],201);
        }
    }
}
