<?php

namespace App\Providers;

use App\Mailboxes\MyMailbox;
use BeyondCode\Mailbox\Facades\Mailbox;
use Illuminate\Support\ServiceProvider;

class MailboxServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Mailbox::from('support@dcas.live', MyMailbox::class);
    }
}
