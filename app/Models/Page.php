<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable =['name', 'hash_id', 'ip', 'time'];
    use HasFactory;
    public function contents(){
        return $this->belongsToMany(Content::class, 'page_content');
    }
}
