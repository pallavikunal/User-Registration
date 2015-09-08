<?php
namespace App\Models;
use Eloquent;

class Identity extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'identity';

    /**
     * Relationship for one to one
     *
     */
    public function user() {
        return $this->belongsTo('App\Models\UserReg');
    }

}
