<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_credits', function (Blueprint $table) {
<<<<<<< HEAD
            $table->text('Relev_banq')->after('nombre_pr')->nullable();
            $table->text('fichie_paie')->after('nombre_pr')->nullable();
=======
            $table->text('Relev_banq')->after('nombre_pr');
            $table->text('fichie_paie')->after('nombre_pr');
>>>>>>> d5732def0f6e3aee9d399bc77f29d99362990c6f
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_credits', function (Blueprint $table) {
            //
        });
    }
}
