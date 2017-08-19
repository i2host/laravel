<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    public function i18n() {
        return $this->belongsTo('App\I18n');
    }

    public function subscription() {
        return $this->hasMany('App\Subscription');
    }
}
