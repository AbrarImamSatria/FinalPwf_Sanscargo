<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTarifTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_post_new_tarif()
    {
        $admin = User::factory()->create(['status' => 'Admin']);

        $response = $this->actingAs($admin)->post('/admin/ongkir', [
            'kota_asal' => 'Jogja',
            'kota_tujuan' => 'Jakarta',
            'jenis_layanan' => 'Express',
            'berat_minimum' => 1.0,
            'berat_maksimum' => 10.0,
            'harga_per_kg' => 15000.00,
            'harga_minimum' => 15000.00,
            'estimasi_hari' => 2,
            'status' => true
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('ongkir', [
            'kota_asal' => 'Jogja',
            'kota_tujuan' => 'Jakarta',
            'jenis_layanan' => 'Express'
        ]);
    }
}
