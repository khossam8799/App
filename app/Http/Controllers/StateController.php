<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    public function store(Request $request){
        $validator = validator::make($request->all(),
         ['name' => 'required|unique:states'],

         ['name.required' => 'Please enter state name','name.unique' => 'state name already exisit']);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],404);
        }
        else{
            State::create($request->all());
            return response()->json(['message'=>'state created Successfully'],201);
        }
    }

    public function update(Request $request){
        $validator = validator::make($request->all(),
         ['id'=> 'required|exists:states,id', 'name' => 'required|unique:states'],

         ['id.required'=>'please enter state id','id.exists'=>'please enter an existing state id',
         'name.required' => 'Please enter state name','name.unique' => 'state name already exisit' ]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],404);
        }
        else{
            $state=State::find($request->id);
            $state->name=$request->name;
            $state->save();
            return response()->json(['message'=>'State updated Successfully'],200);
        }
    }

    public function delete(Request $request){
        $validator = validator::make($request->all(),
        ['id'=> 'required|exists:states,id'],

        ['id.required'=>'please enter state id','id.exists'=>'please enter an existing state id',]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],404);
        }
        else{
            $citiesStatesIds=City::select('stateId')->distinct()->get()->pluck('stateId')->toArray();
            if(in_array($request->id,$citiesStatesIds)){
                return response()->json(['message'=>'Cannot be deleted ,this State has cities'],200);
            }
            else{
                $state=State::find($request->id);
                $state->delete();
                return response()->json(['message'=>'State deleted successfully'],200);
            }
        }
    }

    public function count(){
        return response()->json(['count'=>State::count()],200);
    }


}
