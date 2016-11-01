<?php
namespace Lara\Auth\App\Models;

use CMS\App\Models\Traits\ModelTrait;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kodeine\Acl\Traits\HasRole;
use Lara\Auth\App\Observers\UserObserver;
use Laravel\Passport\HasApiTokens;

use Laravel\Scout\Searchable;

class User extends \App\User
{
    use HasApiTokens, Notifiable, SoftDeletes, ModelTrait, Searchable, HasRole;


    protected $with = ['info'];

    protected $dates = ['deleted_at'];



    protected static function boot()
    {
        parent::boot();

        parent::observe(new UserObserver);
    }

    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function infoRepo(){
        return $this->info ?: new UserInfo();
    }

    public function setPasswordAttribute($value)
    {
        if (Hash::needsRehash($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function routeNotificationForSlack(){
        $slack_webhook_url = env('SLACK_WEBHOOK_URL', 'https://hooks.slack.com/services/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');
        return $slack_webhook_url;
    }

    // Customize Email address
    public function routeNotificationForMail()
    {
//        return 'ttungbmt@gmail.com';
        return $this->email;
    }

    // Customize index search
//    public function toSearchableArray()
//    {
//        return [
//            'name' => $this->name
//        ];
//    }
}