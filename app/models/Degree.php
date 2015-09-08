<?php
namespace App\Models;
use Eloquent;

class Degree extends Eloquent {
    /*
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'degree';

    /**
     * Relationship for one to Many
     *
     */
    public function user() {
        
        return $this->hasMany('App\Models\UserReg');
    }

}
