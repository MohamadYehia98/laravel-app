<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MainCategory extends Model
{
    //
    use Notifiable;

    protected $timestamp = false;
    protected $table = 'main_categories';

    protected $fillable = [
        'translation_lang', 'translation_of', '	name','	slug','	photo','active','created_at','updated_at'
    ];

    public function scopeActive($query){

        return $query -> where('active',1);
    }

    public function scopeSelection($query){

        return $query -> select('id','translation_lang','name','slug','photo','active');
    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }

}
