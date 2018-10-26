<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{

    /**
     * @var \Symfony\Component\Console\Output\ConsoleOutput
     */
    protected $output;

    /**
     * DatabaseSeeder constructor.
     */
    public function __construct()
    {
        $this->output = new ConsoleOutput;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->logAndOutput('Database tables successfully created');

        $this->installPassportGrants();

        $this->seedDatabase();
    }

    /**
     * @param string $message
     */
    protected function logAndOutput(string $message)
    {
        $this->output->writeln("<info>{$message}.</info>");

        info("{$message}.");
    }

    /**
     *  Install Laravel Passport grants.
     */
    protected function installPassportGrants()
    {
        $this->logAndOutput('Passport::Install job started');
        Artisan::call('passport:install');
        $this->logAndOutput('Passport::Install job successfully completed');
    }

    /**
     * Seed the database with test data.
     */
    protected function seedDatabase()
    {
        $this->logAndOutput('Database seeding started');

        $this->logAndOutput('Seeding Administrator user and test employees');
        factory(App\Models\Roles\Employee::class)->state('administrator')->create();
        factory(App\Models\Roles\Employee::class, 24)->create();

        $this->logAndOutput('Seeding test customers');
        factory(App\Models\Roles\Customer::class, 100)->create();

        $this->logAndOutput('Seeding test vendors');
        factory(App\Models\Roles\Vendor::class, 50)->create();

        $this->logAndOutput('Seeding test whitegloves customers');
        factory(App\Models\Roles\Whiteglove::class, 50)->create();

        $this->logAndOutput('Seeding roles');
        $this->call(RoleTableSeeder::class);

        $this->logAndOutput('Seeding permissions');
        $this->call(PermissionTableSeeder::class);

        $this->logAndOutput('Assign permissions to roles');
        $this->call(RoleHasPermissionsTableSeeder::class);

        $this->logAndOutput('Seeding About Us page');
        $this->call(AboutUsTableSeeder::class);

        $this->logAndOutput('Seeding datacenters');
        $this->call(DatacenterTableSeeder::class);

        $this->logAndOutput('Seeding departments');
        $this->call(DepartmentTableSeeder::class);

        $this->logAndOutput('Seeding queues');
        $this->call(QueueTableSeeder::class);

        $this->logAndOutput('Seeding statuses');
        $this->call(StatusTableSeeder::class);

        $this->logAndOutput('Seeding Tickets');
        factory(App\Models\Support\Ticket::class, 75)->create();

        $this->logAndOutput('Seeding persons for AboutUs page');
        factory(App\Models\Website\AboutUs::class, 19)->create();

        $this->logAndOutput('Seeding Comments');
        factory(App\Models\Support\Comment::class, 1517)->create();

        $this->logAndOutput('Seeding Notes');
        factory(App\Models\Support\Note::class, 354)->create();

        $this->logAndOutput('Seeding Airports');
        $this->call(AirportTableSeeder::class);

        $this->logAndOutput('Seeding Tld Extensions');
        $this->call(TldExtensionTableSeeder::class);

        $this->logAndOutput('Database seeded');
    }
}
