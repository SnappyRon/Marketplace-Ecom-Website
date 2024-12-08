<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'phone_number',
                'email',
                'city',
                'state',
                'postal_code',
                'country',
            ]);
        });
    }
};
