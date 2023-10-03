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
        Schema::create('vendor_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            
            $table->string('shop name');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('pincode');
            $table->timestamps();     
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
