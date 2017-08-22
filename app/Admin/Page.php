<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    public function i18n() {
        return $this->belongsTo('App\Admin\I18n');
    }
}
