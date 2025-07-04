<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddTarifPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_create_tarif_page()
    {
        // Buat user dengan status Admin
        $admin = User::factory()->create(['status' => 'Admin']);

        // Login sebagai admin
        $response = $this->actingAs($admin)->get('/admin/ongkir/create');

        // Cek apakah berhasil akses halaman (200 OK)
        $response->assertStatus(200);
    }
}
