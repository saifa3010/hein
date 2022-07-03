<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CatagorySub;
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('category_nameB')->nullable();
            $table->string('category_nameS')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->unsignedBigInteger('sub_id')->nullable();            
            $table->timestamps();

            $table->foreign('sub_id')->references('id')->on('catagory_subs')->nullOnDelete();
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
