<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use ReflectionClass;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $connection = 'mysql2';

    /**
     * @var RemoteDB
     * belongsTo
     */
    public function user()
    {
        return User::where('id', $this->id)->first();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getAttribute($key)
    {

        if (array_key_exists($key, $this->attributes) || $this->hasGetMutator($key)) {
            return $this->getAttributeValue($key);
        }
        $oReflectionClass = new ReflectionClass(Post::class);
        $comment_string = $oReflectionClass->getMethod($key)->getDocComment();
        $pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";
        preg_match_all($pattern, $comment_string, $matches, PREG_PATTERN_ORDER);

        foreach ($matches as $match){
            if (in_array('@var RemoteDB', $match)) return $this->$key();
        }

        return $this->getRelationValue($key);
    }
}
