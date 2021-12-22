<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Branch extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['name','desc','note','address'];

    protected $fillable = [
        'foundation_id' , 'creator_id', 'city_id', 'map' , 'pwd_status', 'phone1' , 'phone2' ,
        'landline1' , 'landline2', 'email', 'name','desc','note','address'
    ];
}
