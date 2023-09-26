<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng categories)
 * --> php artisan make:migration add_softdelete_to_users_table --table=users
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng users trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2023_09_21_033447_add_softdelete_to_users_table.php
 */

class AddSoftdeleteToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
