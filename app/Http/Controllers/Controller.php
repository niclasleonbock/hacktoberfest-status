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

    public function getEncouragementText($total_prs)
    {
        if ($total_prs >= config('settings.required_prs'))
            $encouragement_message = "Congrats, you're done!";
        elseif ($total_prs == 1)
            $encouragement_message = "A good start, just keep doing.";
        elseif ((int) (config('settings.required_prs') / $total_prs) == 2 )
            $encouragement_message = "Almost halfway there, keep doing.";
        elseif ((config('settings.required_prs') / $total_prs) == 2)
            $encouragement_message = "You're halfway there, keep doing!";
        elseif ((config('settings.required_prs') - $total_prs) == 2)
            $encouragement_message = "Only 2 left, let's keep doing.";
        else
            $encouragement_message = "You're almost done.";
        return $encouragement_message;
    }
}
