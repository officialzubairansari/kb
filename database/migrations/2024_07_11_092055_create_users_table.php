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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('company')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('contact_no')->nullable()->default(null);
            $table->string('user_type');
            $table->string('email');
            $table->string('employee_code')->nullable()->default(null);
            $table->string('cnic_no')->nullable()->default(null);
            $table->string('password');
            $table->integer('is_active')->default(0);
            $table->string('profile');
            $table->string('remember_token')->nullable()->default(null);
            $table->integer('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
