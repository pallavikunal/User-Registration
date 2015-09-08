<?php

namespace App\Controllers;

use View;
use Input;
use Cache;
use PDF;
use Response;
use Redirect;
//use App\Libraries\Helpers\AjaxHelper;
//use App\Libraries\Interfaces\AjaxInterface;
use App\Repositories\UserRegRepository;

class UserRegController extends \BaseController {//implements AjaxInterface {

    /**
     * @var object
     *
     */

    private $user;

    /**
     *
     * @param \App\Repositories\UserRepository $user
     */
    public function __construct(UserRegRepository $user) {
        $this->user = $user;
        //$this->initializeAjax();
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
     * Store a newly created resource in storage.
     *
     * @return Response
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

    /**
     * Initializing ajax methods
     *
     */
    public function initializeAjax() {
        if (!Cache::has('service_change_status') && !Cache::has('service_delete')) {
            $ajaxParam = array(
                'service_status' => array(
                    'controller' => get_class($this),
                    'repository' => get_class($this->service),
                    'action' => 'onChangeStatus'
                ),
                'service_delete' => array(
                    'controller' => get_class($this),
                    'repository' => get_class($this->service),
                    'action' => 'onDelete'
                ),
            );
            AjaxHelper::setAjaxInfo('service_change_status', $ajaxParam['service_status']);
            AjaxHelper::setAjaxInfo('service_delete', $ajaxParam['service_delete']);
        }
    }

}
