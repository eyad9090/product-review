<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface Validation {
  public function validate(Request $request);
}