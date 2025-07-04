<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/pengaturan/profil/update', [
            'nama_lengkap' => 'Nama Baru',
            'email' => 'baru@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Alamat baru'
        ]);

        $response->assertStatus(302); // Redirect back to profile

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'nama_lengkap' => 'Nama Baru',
            'email' => 'baru@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Alamat baru'
        ]);
    }
}
