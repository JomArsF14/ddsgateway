<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class User2Service
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.users2.base_uri');
    }

    public function createUser2($data)
    {
        return $this->performRequest('POST', '/users', $data);
    }
    
    public function obtainUsers2() // ✅ Added this method to fetch all users
    {
        return $this->performRequest('GET', '/users');
    }
    public function obtainUser2($id)
    {
        return $this->performRequest('GET', "/users/{$id}");
    }
    
    public function editUser2($data, $id) 
    {
        return $this->performRequest('PUT', "/users/{$id}", $data);
    }
    
    public function deleteUser2($id)
    {
        return $this->performRequest('DELETE', "/users/{$id}");
    }
}