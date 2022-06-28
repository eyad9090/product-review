<?php
namespace App\Interfaces;


interface ProductsQueries extends GeneralQueries {
  public function update($id);
  public function delete($id);
  public function store($inputs);
}
