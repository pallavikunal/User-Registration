<?php
namespace App\Models;
use Eloquent;

class UserReg extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Relationship for one to one
     *
     */
    public function identity() {
        return $this->hasOne('App\Models\Identity','user_id');
    }
    
    /**
     * Relationship for one to one
     *
     */
    public function degree() {
        return $this->belongsTo('App\Models\Degree');
    }
}
