<?php

namespace Lara\Auth\App\Models;

use CMS\App\Models\MyModel;

class UserInfo extends MyModel  {

    protected $table = 'users_info';

    protected $fillable = ['user_id', 'fullname', 'status', 'phone', 'address', 'birthday', 'gender', 'title'];

    protected $dates = ['birthday'];

    public $timestamps = false;


}