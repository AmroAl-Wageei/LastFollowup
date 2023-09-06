<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Student extends Model
{
    use HasFactory;
    use softDeletes;
    protected $softDelete = true;

    // 1 - Best Practice " $fillable "
    // protected $fillable = ['fname' , 'postion' , 'company'];

    // 2 - Another Way if we have multi colums " $guarded "
    // protected $guarded;

    // 3 -iF We have many colums put we dont have some of coulm
    protected $guarded=['company'];

}
