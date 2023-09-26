<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng categories)
 * --> php artisan make:migration add_softdelete_to_categories_table --table=categories
 * --> php artisan make:migration add_softdelete_to_articles_table --table=articles
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng products trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2023_09_22_075841_add_softdelete_to_categories_table.php
 */

class AddSoftdeleteToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); // add phương thức softDelete() vào table categories
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
