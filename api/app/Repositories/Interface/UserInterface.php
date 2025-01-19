<?php

namespace App\Repositories\Interface;

interface UserInterface
{
    public function all();
    public function create(array $data);
    public function update(array $data, int $id);
    public function findByID(int $id);
    public function delete(int $id);

    public function call(int $call, int $id);
    
}
