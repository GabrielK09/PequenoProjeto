<?php

namespace App\Repositories\Interface;

interface CardInterface
{
    public function create(array $data, string $file_path);
    public function update(array $data, int $id);
    public function findByID(int $id);
    public function delete(int $id);

}