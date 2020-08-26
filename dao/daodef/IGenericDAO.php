<?php
interface IGenericDAO
{
    public function create($oject);
    public function read();
    public function update($object);
    public function delete($object);
}
