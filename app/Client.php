<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description',
        'icon_media_id',
        'hours_logged',
    ];

    public function projects() {
        return $this->hasMany('App\Project', 'client_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'client_users');
    }

}
