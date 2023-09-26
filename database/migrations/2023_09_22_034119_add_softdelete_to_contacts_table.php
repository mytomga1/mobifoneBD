<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * (Sử dụng câu lệnh này để add cột softdelete trong bảng contacts)
 * --> php artisan make:migration add_softdelete_to_contacts_table --table=contacts
 *
 * (Sử dụng câu lệnh này để upload cột deleted_at(softdelete) trong bảng roles trong DB)
 *     php artisan migrate --path=/database/migrations/(Tên file.php)
 * --> php artisan migrate --path=/database/migrations/2023_09_22_034119_add_softdelete_to_contacts_table.php
 */

class AddSoftdeleteToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->softDeletes(); // add phương thức softDelete() vào table
        });
    }
}
