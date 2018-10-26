<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutUsTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function an_aboutus_entry_has_a_path()
    {
        $aboutUs = factory(\App\Models\Website\AboutUs::class)->create([
            'id' => 1,
        ]);

        $this->assertSame('/about-us/1', $aboutUs->path());
    }

    /** @test */
    public function an_aboutus_entry_cannot_be_edited_by_a_guest()
    {
        $aboutUs = factory(\App\Models\Website\AboutUs::class)->create([
            'name' => 'Entry One',
        ]);

        $payload = [
            'name' => $name = 'Entry One Changed',
        ];

        $this->patch(route('aboutus.update', $aboutUs->id), $payload);

        $this->assertDatabaseHas('about_us', [
            'name' => 'Entry One',
        ]);

        $this->get(route('aboutus'))->assertSee('Entry One');
    }

    /** @test */
    public function an_aboutus_entry_can_be_edited_only_by_admins()
    {
        $user = factory(\App\Models\Roles\Employee::class)->create();

        factory(\App\Models\General\Role::class)->create(['name' => 'superadmin', 'guard_name' => 'employee']);

        $user->assignRole('superadmin');

        $this->actingAs($user, $this->loginGuard());

        $aboutUs = factory(\App\Models\Website\AboutUs::class)->create();

        $payload = [
            'name'        => $name = 'Entry One Changed',
            'job_title'   => 'Chief Executive Officer',
            'job_summary' => 'Blah blah blah',
        ];

        $this->patch(route('aboutus.update', $aboutUs->id), $payload)->assertRedirect(route('aboutus'));

        $this->assertDatabaseHas('about_us', $payload);

        $this->get(route('aboutus'))->assertSee($name);
    }

    /**
     * Set login guard.
     *
     * @return string
     */
    private function loginGuard(): string
    {
        return 'employee';
    }
}
