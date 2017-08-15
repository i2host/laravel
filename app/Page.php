<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    public function i18n() {
        return $this->belongsTo('App\I18n');
    }
}
