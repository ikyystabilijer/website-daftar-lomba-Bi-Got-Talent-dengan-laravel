<?php

namespace Tests\Feature;

use App\Models\Lomba;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLombaManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_open_the_lomba_edit_form(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $lomba = Lomba::create([
            'nama_lomba' => 'Web Design',
            'deskripsi' => 'Kompetisi desain web',
        ]);

        $response = $this->actingAs($admin)
            ->get(route('admin.lomba.edit', $lomba));

        $response->assertOk()
            ->assertViewIs('admin.edit_lomba')
            ->assertSee('Edit Mata Lomba: Web Design')
            ->assertSee(route('admin.lomba.update', $lomba), false)
            ->assertSee('name="nama_lomba"', false)
            ->assertSee('name="deskripsi"', false);
    }
}
