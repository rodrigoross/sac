<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('code')->unique()->primary();
            $table->tinyInteger('type')->default(0);
            $table->string('subject');
            $table->string('description');
            $table->tinyInteger('status')->default(0);
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(User::class, 'attendant_id')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
