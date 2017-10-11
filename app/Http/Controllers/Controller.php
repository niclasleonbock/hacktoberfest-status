<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Indicates weather routes in this controller are in sharing mode.
     *
     * @var boolean
     */
    protected $sharingMode = false;


    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        view()->share(['sharingMode' => $this->sharingMode]);
    }
}
