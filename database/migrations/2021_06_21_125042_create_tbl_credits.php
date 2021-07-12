<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCredits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tbl_credits', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id("id_cred")->nullable();
            $table->string('cin' ,25)->nullable();
            $table->string('nom' ,25)->nullable();
            $table->string('prenom' ,25)->nullable();
            $table->text('date_nes' )->nullable();
            $table->string('projet' ,25)->nullable();
            $table->string('type' ,25)->nullable();
            $table->double('montant')->nullable();
            $table->double('monsualite')->nullable();
            $table->integer('duree')->nullable();
            $table->double('credit_encour'  )->nullable();
            $table->integer('nombre_pr')->nullable();
=======
            $table->id("id_cred");
            $table->string('cin' ,25);
            $table->string('nom' ,25);
            $table->string('prenom' ,25);
            $table->date('date_nes' );
            $table->string('projet' ,25);
            $table->string('type' ,25);
            $table->double('montant');
            $table->double('monsualite');
            $table->integer('duree');
            $table->double('credit_encour'  );
            $table->integer('nombre_pr');
>>>>>>> d5732def0f6e3aee9d399bc77f29d99362990c6f
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
        Schema::dropIfExists('tbl_credits');
    }
}
