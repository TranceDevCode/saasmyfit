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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('company_customer', function(Blueprint $table) {
            $table->foreignId('company_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->primary(['company_id', 'customer_id']);
        });

        Schema::create('company_member', function(Blueprint $table) {
            $table->foreignId('company_id')->constrained();
            $table->foreignId('member_id')->constrained();
            $table->primary(['company_id', 'member_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_customer');
        Schema::dropIfExists('company_member');
        Schema::dropIfExists('companies');
    }
};
