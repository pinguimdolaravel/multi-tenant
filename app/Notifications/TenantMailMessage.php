<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;

class TenantMailMessage extends MailMessage
{
    public function __construct()
    {
        $this->from(tenant()->from, tenant()->name);
    }
}
