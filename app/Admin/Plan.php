<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    public function i18n() {
        return $this->belongsTo('App\Admin\I18n');
    }

    public function subscription() {
        return $this->hasMany('App\Admin\Subscription');
    }
}
