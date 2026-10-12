<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\LabelRecord;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Track;
use App\Models\Studio;
use App\Models\Equipment;
use App\Models\Renter;
use App\Models\Booking;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $genre = Genre::create(['name' => 'Alternative Rock']);
        $label = LabelRecord::create(['name' => 'Soundwave Records', 'country' => 'Indonesia']);

        $artist = Artist::create([
            'genre_id'        => $genre->id,
            'label_record_id' => $label->id,
            'stage_name'      => 'The Echoes',
            'debut_year'      => 2021,
        ]);

        $album = Album::create([
            'artist_id'    => $artist->id,
            'genre_id'     => $genre->id,
            'title'        => 'Resonance',
            'release_date' => '2023-05-15',
        ]);

        Track::create([
            'album_id'         => $album->id,
            'title'            => 'Midnight Shadow',
            'duration_seconds' => 245,
            'track_number'     => 1,
        ]);

        $studio = Studio::create([
            'name'        => 'Studio A - Grand Recording',
            'hourly_rate' => 150000.00,
            'type'        => 'recording',
        ]);

        Equipment::create([
            'studio_id' => $studio->id,
            'name'      => 'Drum Kit Master Custom',
            'brand'     => 'Yamaha',
            'condition' => 'good',
        ]);

        $renter = Renter::create([
            'name'  => 'Budi Pratama',
            'phone' => '081298765432',
            'email' => 'budi@example.com',
        ]);

        $booking = Booking::create([
            'renter_id'   => $renter->id,
            'studio_id'   => $studio->id,
            'artist_id'   => $artist->id,
            'start_time'  => now()->addDays(1),
            'end_time'    => now()->addDays(1)->addHours(2),
            'total_price' => 300000.00,
            'status'      => 'confirmed',
        ]);

        Payment::create([
            'booking_id'     => $booking->id,
            'amount'         => 300000.00,
            'payment_method' => 'transfer',
            'status'         => 'paid',
        ]);
    }
}