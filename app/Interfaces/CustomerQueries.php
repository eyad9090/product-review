<?php
namespace App\Interfaces;


interface CustomerQueries extends GeneralQueries {
  public function update($inputs);
  public function delete($id);
}
