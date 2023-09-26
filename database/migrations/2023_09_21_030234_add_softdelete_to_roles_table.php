<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng roles)
 * --> php artisan make:migration add_softdelete_to_roles_table --table=roles
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng roles trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2022_08_12_180908_add_softdelete_to_roles_table.php
 */

class AddSoftdeleteToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->softDeletes(); // add phương thức softDelete() vào table roles
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
