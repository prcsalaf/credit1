<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_credits', function (Blueprint $table) {
            
                $table->text("VIDRapport"  )->nullable();            
                $table->text("VCode_err" )->nullable();
                $table->text("VInfo_negatif"  )->nullable();             
                $table->text("VFlag_CB"  )->nullable()      ;        
                $table->text("R_GRAV_CB"   )->nullable()     ;         
                $table->text("R_GRAV_HIST_SALF" )->nullable()  ;            
                $table->text("R_GRAV_FIC"   )->nullable()      ;      
                $table->text("R_GRAV_CDL"  )->nullable()       ;       
                $table->text("VRating"  ) ->nullable()        ;    
                $table->text("VSCORE_CB" )->nullable()        ;      
                $table->text("VGRADE_SCORE_CB" )->nullable()   ;           
                $table->text("R_GRAV_TSL" )  ->nullable()      ;     
                $table->text("V_LibAnomalie"   ) ->nullable()  ;
                
               
           
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
