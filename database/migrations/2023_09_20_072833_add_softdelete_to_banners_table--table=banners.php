<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng banners)
 * --> php artisan make:migration add_softdelete_to_banners_table --table=banners
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng banners trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2022_08_12_184338_add_softdelete_to_banners_table.php
 */

class AddSoftdeleteToBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->softDeletes(); // add phương thức softDelete() vào table
        });

        Schema::table('banners', function (Blueprint $table){
             $table->softDeletes(); // add phương thức soft
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            //
        });
    }
}
