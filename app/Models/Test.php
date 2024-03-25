<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Test extends Model
{
    use HasFactory , SoftDeletes;
    const DELETED_AT = 'my_soft_delete';
    protected $fillable=[
     'name',
     'content',
     'status',
     'show',
     //'data',
    ];

    protected static function boot()
    {
        parent::boot();

        
        
        static::replicating(function($model){
            $model->my_soft_delete= now();//we take it my_soft_delete from create_taste_table
            $model->save();

        });

        

        
    }

    

    



}
