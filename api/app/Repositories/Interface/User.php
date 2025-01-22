<?php

namespace App\Repositories\Interface;

interface User
{
    public function all();
    public function create(array $data);
    public function update(array $data, int $id);
    public function findByID(int $id);
    public function delete(int $id);

    public function callInput(int $call, int $id);
    public function callExit(int $call, int $id);
    
}
