<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;

class CityController extends Controller
{
    public function store(Request $request){
        $request->validate(['name' => 'required|unique:cities']);
        $city=City::where('name','=',$request->input('name'))->first();
        if(isset($city)){
            return response()->json(['message'=>'City already exists'],200);
        }
        else{
            City::create($request->all());
            return response()->json(['message'=>'City created Successfully'],201);
        }
    }

    public function update(Request $request,$id){
        $request->validate(['name' => 'required|unique:cities']);
        $city=City::find($id);
        if(isset($city)){
            $city->name=$request->name;
            $city->stateId=$request->stateId;
            $city->save();
            return response()->json(['message'=>'City updated Successfully'],200);
        }
        else{
            return response()->json(['message'=>'City does not exist'],404);
        }
    }

    public function delete($id){
        $city=City::find($id);
        if(isset($city)){
            $areascitiesIds=Area::select('cityId')->distinct()->get()->pluck('cityId')->toArray();
            if(in_array($id,$areascitiesIds)){
                return response()->json(['message'=>'Cannot be deleted ,this City has areas'],200);
            }
            else{
                $city->delete();
                return response()->json(['message'=>'City deleted successfully'],200);
            }
        }
        else{
            return response()->json(['message'=>'City does not exist'],404);
        }
    }

    public function countCitiesOfState($stateId){
        $count=City::where('stateId',$stateId)->count();
        return response()->json(['count'=>$count],200);
    }
}
