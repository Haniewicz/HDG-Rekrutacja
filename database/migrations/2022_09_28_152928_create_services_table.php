<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->boolean('active')->default(true);
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->integer('price_netto');
            $table->integer('vat');
            $table->timestamps();
            $table->unique(['service_name', 'company_id']);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
