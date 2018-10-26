<?php

namespace App\Mailboxes;

use BeyondCode\Mailbox\InboundEmail;

/**
 * Class MyMailbox
 *
 * @package App\Mailboxes
 */
class MyMailbox
{

    /**
     * @param \BeyondCode\Mailbox\InboundEmail $email
     */
    public function __invoke(InboundEmail $email)
    {
        // Handle the incoming email
    }
}
