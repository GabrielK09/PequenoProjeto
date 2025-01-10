<?php

namespace App;

interface UserInterface
{
    public function all();
    public function create(array $data);
}
