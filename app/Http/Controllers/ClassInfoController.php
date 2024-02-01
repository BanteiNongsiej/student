<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Http\Requests\ClassInfoRequest;

class ClassInfoController extends Controller
{
    public function create(ClassInfoRequest $request){
        try{
            $classinfo=new ClassInfo();
        $classinfo->name=$request->name;
        $classinfo->save();
        return response()->json([
            "data"=>$classinfo,
            "message"=>"Class Information record is inserted successfully"
        ],201);
        }
        catch(Exception $e){
            return response()->json([
                "message"=>"Class Information record insertion failed."
            ],404);
        }
    }
    public function edit(ClassInfoRequest $request,ClassInfo $classinfo){
        try{
            $classinfo->name=$request->name;
            $classinfo->is_active='Y';
            $classinfo->save();
            return response()->json([
                "data"=>$classinfo->name,
                "message"=>"Class Information Record updated successfully"
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "message"=>"Class information record not updated"
            ]);
        }
    }
}
