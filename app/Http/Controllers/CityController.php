<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function store(Request $request){
        $validator = validator::make($request->all(),
        ['name' => 'required|unique:cities', 'stateId'=>'required|exists:states,id'],

        ['name.required' => 'Please enter city name','name.unique' => 'city name already exisit',
         'stateId.required'=>'please enter state id','stateId.exists'=>'please enter an existing state id']);

       if($validator->fails()){
           return response()->json(['message'=>$validator->errors()],404);
       }
       else{
           City::create($request->all());
           return response()->json(['message'=>'city created Successfully'],200);
       }
    }

    public function update(Request $request){
        $validator = validator::make($request->all(),
         ['id'=> 'required|exists:cities,id', 'name' => 'required|unique:cities',
          'stateId'=>'required|exists:states,id'],

         ['id.required'=>'please enter city id','id.exists'=>'please enter an existing city id',
          'name.required' => 'Please enter city name','name.unique' => 'city name already exisits',
          'stateId.required'=>'please enter state id','stateId.exists'=>'please enter an existing state id']);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],404);
        }
        else{
            $city=City::find($request->id);
            $city->name=$request->name;
            $city->stateId=$request->stateId;
            $city->save();
            return response()->json(['message'=>'City updated Successfully'],200);
        }
    }

    public function delete(Request $request){
        $validator = validator::make($request->all(),
        ['id'=> 'required|exists:cities,id'],

        ['id.required'=>'please enter city id','id.exists'=>'please enter an existing city id',]);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],404);
        }
        else{
            $areascitiesIds=Area::select('cityId')->distinct()->get()->pluck('cityId')->toArray();
            if(in_array($request->id,$areascitiesIds)){
                return response()->json(['message'=>'Cannot be deleted ,this city has areas'],404);
            }
            else{
                $state=City::find($request->id);
                $state->delete();
                return response()->json(['message'=>'City deleted successfully'],200);
            }
        }
    }

    public function countCitiesOfState(Request $request){
        $validator=validator::make($request->all(),
        ['stateId'=>'required|exists:states,id'],

        ['stateId.required'=>'please enter a state id', 'stateId.exists'=>'please enter an existing state id']);

        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()],404);
        }
        else{
            $count=City::where('stateId',$request->stateId)->count();
            return response()->json(['count'=>$count],200);
        }
    }
}
