<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'message',
         
     ];

     public static function rules($id = null)
     {
         return [
             'mensaje' => [
                 'required',
                 Rule::unique('notificaciones')->ignore($id),
             ],
         ];
     }
     protected $table = 'notification';
}
