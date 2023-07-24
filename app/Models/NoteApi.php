<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteApi extends Model
{
    use HasFactory;

    protected $guarded=[];
protected $hidden=['updated_at','created_at'];

}
