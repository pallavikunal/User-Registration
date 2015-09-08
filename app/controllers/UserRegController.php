<?php

namespace App\Controllers;

use View;
use Input;
use PDF;
use Response;
use Redirect;
use App\Repositories\UserRegRepository;

class UserRegController extends \BaseController {

    /**
     * @var object
     *
     */

    private $user;
    
    /**
     * 
     * @param UserRegRepository $user
     */
    public function __construct(UserRegRepository $user) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *  
     * @return Response
     */
    public function index() {
        $degree = $this->user->getAllDegree();

        return View::make('user.create', ['degree' => $degree]);
    }

    /**
     * Store user detail in database
     * 
     * @return response
     */
    public function store() {
        $userId = $this->user->createUser(Input::all());
        if (!is_integer($userId)) {

            return Redirect::back()->withInput()->withErrors($this->user->getMessage());
        }

        return Redirect::route('user.downloadHere', $userId)
                        ->with('message', "Service Added successfully!");
    }

    /**
     * show download Here page
     *  
     * @param type $userId
     * @return type
     */
    public function downloadFromHere($userId) {
        $userDetail = $this->user->getUserById($userId);

        return View::make('user.downloadHere', ['userDetail' => $userDetail]);
    }

    /**
     * Download PDF
     * 
     * @param type $userId
     * @return type
     */
    public function generatePDF($userId) {
        $userDetail = $this->user->getUserById($userId);
        $identityDetail = $this->user->getIdentityById($userId);
        $pdf = PDF::loadView('user.pdf', ['userDetail' => $userDetail, 'identityDetail' => $identityDetail]);

        return $pdf->download('userDetail.pdf');
    }
}