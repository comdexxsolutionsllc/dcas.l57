<?php

namespace App\Types;

use Illuminate\Support\Collection;

/**
 * Class Department
 *
 * @package App\Types
 */
class Department extends Collection
{

    use Typeable;

    const ACCOUNTING = 'Accounting';

    const BACKUP = 'Backup';

    const CUSTOMER_CARE = 'Customer Care';

    const HARDWARE = 'Hardware';

    const LEGAL = 'Legal';

    const MANAGED_SERVICES = 'Managed Services';

    const MONITORING = 'Monitoring';

    const NOC = 'NOC';

    const NETWORKING = 'Networking';

    const PROFESSIONAL_SERVICES = 'Professional Services';

    const PURCHASING = 'Purchasing';

    const ROD = 'ROD';

    const SALES = 'Sales';

    const SECURITY = 'Security';

    const TRAINING = 'Training';

    const WEB_DEVELOPMENT = 'Web Development';
}
