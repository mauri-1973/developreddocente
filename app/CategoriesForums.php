<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesForums extends Model
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    protected $table = "categoriesforums";
    protected $primaryKey = 'idcatfor';
    protected $fillable = ['idres', 'namecat'];
    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
        'deleted_at' => 'date:d-m-Y',
    ];

    public function resources()
    {
        return $this->hasMany('App\Resource');
    }

    public function scopeSearchCategory($query, $name)
    {
        return $query->where('name', $name);
    }
}
