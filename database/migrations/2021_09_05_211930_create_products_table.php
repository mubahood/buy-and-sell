<?php

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products'))
        //Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignIdFor(category::class);
            $table->foreignIdFor(User::class);
            $table->string('price');
            $table->string('slug')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('quantity')->nullable();
            $table->string('images')->nullable();
            $table->string('attributes')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
