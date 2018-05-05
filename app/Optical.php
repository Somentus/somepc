<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Build;

class Optical extends Model
{
	public function name() {
		return "Optical Drive";
	}
}
