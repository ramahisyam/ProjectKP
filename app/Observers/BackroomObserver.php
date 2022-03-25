<?php

namespace App\Observers;

use App\Models\CustomerRequest;
use App\Notifications\BackroomNotification;

class BackroomObserver
{
    public function created(CustomerRequest $customerRequest)
    {
        // $customerRequest->notify(new BackroomNotification($customerRequest));
    }
}
