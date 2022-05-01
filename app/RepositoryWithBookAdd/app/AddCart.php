<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddCart extends Model
{
    protected $fillable = ["price","title","quantity","image","user_id","status","b_id","addQty"];
}
