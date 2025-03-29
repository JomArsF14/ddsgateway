<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
//use App\Models\User;
use DB;
use App\Services\User1Service;

class User1Controller extends Controller {
    //to add trait apiresponser
    use ApiResponser;

    /**
     * The Service to consume user1 microservice
     * @var user1Service
    */
    public $user1Service;

    /**
     * create new controller intance
     * @var void
    */
    public function __construct(user1Service $user1Service){
        $this->user1Service = $user1Service;
    }

    /**
     * create new controller intance
     * @var void
    */
    public function index(){
        return $this->successResponse($this->user1Service->obtainUsers1());
    }



//return $this->successResponse($this->user1Service->createUser1($request->all(), Response::HTTP_CREATED))




    public function getUsers(){
        
    }

    public function add(Request $request) {
        
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id) {
        $rules = [
            'username' => 'max:20',
            'password' => 'max:20',
            'gender' => 'in:Male,Female',
        ];
        $this->validate($request, $rules);
        $user = User::findOrFail($id);
        $user->fill($request->all());

        if ($user->isClean()) {
            return response()->json(['error' => 'At least one value must change'], 422);
        }

        $user->save();
        return response()->json($user);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}