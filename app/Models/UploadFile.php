<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type_file',
        'file',
        'user_id'
    ];

  
public function download_file(){
        return $this->hasMany(DownloadFile::class);
    }
    public function UploadFile(){
        return $this->belongsTo(User::class);
    }
  
}
