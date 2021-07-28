<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['hash_id', 'content', 'type', 'page_id'];
    public  function pages()
    {
        return $this->belongsToMany(Page::class,'page_content');
    }
    public static function createContent($request)
    {
        $data = ["hash_id" => User::generateHashId(), "content" => $request["content"], "type" => $request["type"]];
        return Content::create($data);
    }
}
