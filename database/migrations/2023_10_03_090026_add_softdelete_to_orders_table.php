<?php

/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng articles)
 * --> php artisan make:migration add_softdelete_to_orders_table --table=orders
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng articles trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2023_10_03_090026_add_softdelete_to_orders_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes(); // add phương thức softDelete() vào table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
