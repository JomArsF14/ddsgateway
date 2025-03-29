<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
//use App\Models\User;
use DB;
use App\Services\User2Service;

class User2Controller extends Controller {
    //to add trait apiresponser
    use ApiResponser;

    /**
     * The Service to consume user1 microservice
     * @var user2Service
    */
    public $user2Service;

    /**
     * create new controller intance
     * @var void
    */
    public function __construct(user2Service $user2Service){
        $this->user2Service = $user2Service;
    }







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