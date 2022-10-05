<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('nip'); //Needs to be string, so if NIP starts with 0, it's going to be saved properly
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->unique(['company_name', 'nip']);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
