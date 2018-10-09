<?php

$countdownConfig = [

    /*
    |---------------------------------------------------------
    | Configuration of required pull requests for yearly event
    |---------------------------------------------------------
    |
    | Value should be adjusted as needed for each year to 
    | dynamically change messages as status changes
    */
    'required_pr' => 5, // count for 2018

    /*
    |---------------------------------------------------------
    | Completion Message
    |---------------------------------------------------------
    |
    | Message to display when completed PRs > required
    */
    'completed_message' => 'Congrats, you\'re done!',

    /*
    |---------------------------------------------------------
    | Completed Messages
    |---------------------------------------------------------
    |
    | Add overwrites for message to show for specific numbers
    | pull requests as you complete them
    */
    'messages' => [
        0 => 'Seems like you didn\'t even start yet.',
    ],
];

for ($i = 0; $i < $countdownConfig['required_pr']; $i++)
{
    /* if there is a message already set for this count number, skip */
    if (isset($countdownConfig['messages'][$i]))
    {
        continue;
    }

    /* figure out where this iteration falls in the count */
    $percentDone = round(($i / $countdownConfig['required_pr']) * 100);
    $left = $countdownConfig['required_pr'] - $i;

    /*
    |---------------------------------------------------------
    | Set Messages based on percent done thresholds
    |---------------------------------------------------------
    |
    | Using $percentDone as the threshold counter to set the 
    | messages. If amount left is needed,use $left.
    | As required participation changes over the years these 
    | messages should be valid with only changing the required
    | PRs configuration.
    */
    if ($percentDone < 25)
    {
        $countdownConfig['messages'][$i] = 'A good start, just keep doing.';
    }
    elseif ($percentDone < 50)
    {
        $countdownConfig['messages'][$i] = 'Almost halfway there, keep doing.';
    }
    elseif ($percentDone === 50)
    {
        $countdownConfig['messages'][$i] = 'You made it halfway! Keep it up!';
    }
    else
    {
        $countdownConfig['messages'][$i] = 'Only '.$left.' left, let\'s keep doing.';
    }
}

return $countdownConfig;