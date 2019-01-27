<?php

namespace App\Types;

use Illuminate\Support\Collection;

/**
 * Class Queue
 *
 * @package App\Types
 */
class Queue extends Collection
{

    use Typeable;

    const AUTO_PROVISIONING_SYSTEM = 'Auto-provisioning System';

    const CUSTOMER = 'Customer';

    const EMPLOYEE = 'Employee';

    const FACILITIES = 'Facilities';

    const GLOBAL_NOC = 'Global NOC';

    const HARDWARE = 'Hardware';

    const HUMAN_RESOURCES = 'Human Resources';

    const INVENTORY_MANAGEMENT = 'Inventory Management';

    const MANAGED_SERVICIES = 'Managed Services';

    const MISCELLANEOUS = 'Miscellaneous';

    const NETWORK = 'Network';

    const PUBLIC_PORTAL = 'Portal (Public)';

    const PRODUCT_MANAGEMENT = 'Product Management';

    const PROVISIONING = 'Provisioning';

    const REPORTS = 'Reports';

    const TELEPHONY = 'Telephony';
}
