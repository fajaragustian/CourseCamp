<?php

namespace Database\Seeders;

use App\Models\Checkout;
use Illuminate\Database\Seeder;

class PatchCheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $checkout = Checkout::whereTotal(0)->get();
        foreach ($checkout as $key => $checkout) {
            $checkout->update([
                'total' => $checkout->Camp->price,
            ]);
        }
    }
}
