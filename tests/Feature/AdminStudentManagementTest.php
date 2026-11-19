<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminStudentManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_open_the_student_account_edit_form(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $student = User::factory()->create(['role' => 'siswa']);

        $response = $this->actingAs($admin)
            ->get(route('admin.siswa.edit', $student));

        $response->assertOk()
            ->assertViewIs('admin.edit_siswa')
            ->assertSee('Edit Akun Siswa')
            ->assertSee(route('admin.siswa.update', $student), false)
            ->assertSee('name="name"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="password"', false);
    }
}
