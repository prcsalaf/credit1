<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatRegles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl__regles', function (Blueprint $table) {
            $table->id("id_reg");
<<<<<<< HEAD
            $table->float("max_mont"  )->nullable();
            $table->float("min_mont"  )->nullable();
            $table->float("max_mens"  )->nullable();
            $table->float("min_mens"  )->nullable();
            $table->float("max_dure"  )->nullable();
            $table->float("min_dure"  )->nullable();
            $table->string("type"  )->nullable();
            $table->float("taux"  )->nullable();
=======
            $table->float("max_mont"  );
            $table->float("min_mont"  );
            $table->float("max_mens"  );
            $table->float("min_mens"  );
            $table->float("max_dure"  );
            $table->float("min_dure"  );
            $table->string("type"  );
            $table->float("taux"  );
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
        Schema::dropIfExists('tbl__regles');
    }
}
