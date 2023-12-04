<?php

namespace core;

interface Model
{
    public function create(array $data);
    public function read();
    public function update(array $data);
    public function delete(array $data);
}