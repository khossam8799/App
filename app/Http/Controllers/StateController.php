<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class StateController extends Controller
{
    public function store(Request $request){
        $request->validate(['name' => 'required']);
        $state=State::where('name','=',$request->input('name'))->first();
        if(isset($state)){
            return response()->json(['message'=>'State already exists'],200);
        }
        else{
            State::create($request->all());
            return response()->json(['message'=>'State created Successfully'],200);
        }
    }

    public function update(Request $request,$id){
        $request->validate(['name'=>'required|unique:states']);
        $state=State::find($id);
        if(isset($state)){
            $state->name=$request->name;
            $state->save();
            return response()->json(['message'=>'State updated Successfully'],200);
        }
        else{
            return response()->json(['message'=>'State does not exist'],404);
        }
    }

    public function delete($id){
        $state=State::find($id);
        if(isset($state)){
            $citiesStatesIds=City::select('stateId')->distinct()->get()->pluck('stateId')->toArray();
            if(in_array($id,$citiesStatesIds)){
                return response()->json(['message'=>'Cannot be deleted ,this State has cities'],200);
            }
            else{
                $state->delete();
                return response()->json(['message'=>'State deleted successfully'],200);
            }
        }
        else{
            return response()->json(['message'=>'State does not exist'],404);
        }
    }

    public function count(){
        return response()->json(['count'=>State::count()],200);
    }


}
