<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\OpsiPengiriman;

class TarifHargaTest extends TestCase
{
    public function test_tarif_harga_is_integer()
    {
        $tarif = new OpsiPengiriman();
        $tarif->harga = 10000;

        $this->assertIsInt($tarif->harga);
    }
}
