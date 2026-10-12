<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });

        Schema::create('label_records', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('country', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade');
            $table->foreignId('label_record_id')->nullable()->constrained('label_records')->onDelete('set null');
            $table->string('stage_name', 100);
            $table->year('debut_year');
            $table->timestamps();
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained('artists')->onDelete('cascade');
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade');
            $table->string('title', 150);
            $table->date('release_date');
            $table->timestamps();
        });

        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums')->onDelete('cascade');
            $table->string('title', 150);
            $table->integer('duration_seconds');
            $table->integer('track_number');
            $table->timestamps();
        });

        Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->decimal('hourly_rate', 10, 2);
            $table->enum('type', ['rehearsal', 'recording', 'mixing'])->default('rehearsal');
            $table->timestamps();
        });

        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studio_id')->constrained('studios')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('brand', 50);
            $table->enum('condition', ['good', 'fair', 'maintenance'])->default('good');
            $table->timestamps();
        });

        Schema::create('renters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('renter_id')->constrained('renters')->onDelete('cascade');
            $table->foreignId('studio_id')->constrained('studios')->onDelete('cascade');
            $table->foreignId('artist_id')->nullable()->constrained('artists')->onDelete('set null');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['cash', 'transfer', 'e-wallet'])->default('transfer');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('renters');
        Schema::dropIfExists('equipment');
        Schema::dropIfExists('studios');
        Schema::dropIfExists('tracks');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('artists');
        Schema::dropIfExists('label_records');
        Schema::dropIfExists('genres');
    }
};