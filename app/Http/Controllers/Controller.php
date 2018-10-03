<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Indicates wether the application operates in sharing mode.
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
