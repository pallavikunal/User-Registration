<?php

namespace App\Repositories;

use App\Models\UserReg;
use App\Models\Degree;
use App\Models\Identity;

class UserRegRepository {

    /**
     *
     * Setting error or success message
     */
    protected $message;

    /**
     *
     * Get message
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     *
     * Set message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * Get all Degree to show in dropdown
     *
     * @return Array
     */
    public function getAllDegree() {
        $degrees = Degree::all(array('id', 'degreeName'))->toArray();
        array_unshift($degrees, array('id' => "", 'degreeName' => "Select Degree"));

        $result = array();
        foreach ($degrees as &$degree) {
            $result[$degree['id']] = $degree['degreeName'];
        }

        return $result;
    }

    /**
     * Get user by IDs
     *  
     * @param INT $id
     * @return instance 
     */
    public function getUserById($id) {
        
        return UserReg::find($id);
    }
    
    /**
     * Get Identity by ID
     *
     * @return instance 
     */
    public function getIdentityById($id) {
        
        return Identity::find($id);
    }
    

    /**
     * Store User into database
     *  
     * @param Array $input
     * @return Int
     */
    public function createUser($input) {
        $dateArr = explode("/",$input['dateOfBirth']);
        
        $user = new UserReg();
        $user->firstName = $input['firstName'];
        $user->lastName = $input['lastName'];
        $user->dateOfBirth = date("Y-m-d H:i:s", mktime(0,0,0,$dateArr[1],$dateArr[0],$dateArr[2])); // change formate
        $user->communicationAddress = $input['address']; 
        $user->permanentAddress = $input['permanentAddress'];
        $user->contactNumber = $input['contactNumber'];
        $user->degree_id = $input['degree'];        
        $user->save();

        $issuedDateArr = explode("/",$input['issuedDate']);
        $validUptoArr = explode("/",$input['validUpto']);

        $identity = new Identity();
        $identity->user_id = $user->id;
        $identity->type = $input['identifyType'];
        $identity->number = $input['identifyNumber'];
        $identity->issueDate = date("Y-m-d H:i:s", mktime(0,0,0,$issuedDateArr[1],$issuedDateArr[0],$issuedDateArr[2])); // change formate
        $identity->validUpto = date("Y-m-d H:i:s", mktime(0,0,0,$validUptoArr[1],$validUptoArr[0],$validUptoArr[2])); // change formate
        $identity->save();
        
        return $user->id;
    }

}
