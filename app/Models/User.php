<?php

namespace App\Models;

use App\Sheba\Annotation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ReflectionClass;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @var RemoteDB
     */
/*    public function posts()
    {
       return Post::where('user_id', $this->id)->get();
    }*/

    public function posts()
    {
         return $this->setConnection('mysql2')->hasMany(Post::class);
    }

/*    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->attributes) || $this->hasGetMutator($key)) {
            return $this->getAttributeValue($key);
        }
        $oReflectionClass = new ReflectionClass(User::class);
        $comment_string = $oReflectionClass->getMethod('posts')->getDocComment();
        $pattern = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";
        preg_match_all($pattern, $comment_string, $matches, PREG_PATTERN_ORDER);
        foreach ($matches as $match){
             if (in_array('@var RemoteDB', $match)) return $this->posts();
        }

        return $this->getRelationValue($key);
    }*/
/*
    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        $instance = $this->newRelatedInstance($related);

        $foreignKey = $foreignKey ?: $this->getForeignKey();
        $localKey = $localKey ?: $this->getKeyName();
        return $this->newHasMany($instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey);
    }

    protected function newHasMany(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        dd($query, $parent, $foreignKey, $localKey);
        return new HasMany($query, $parent, $foreignKey, $localKey);
    }*/
}
