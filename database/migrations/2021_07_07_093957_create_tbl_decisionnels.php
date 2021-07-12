<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDecisionnels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('tbl_decisionnels', function (Blueprint $table) {
            $table->id('id_decision');
            $table->text('NUM_DOSS' )->nullable();   
            $table->text('CODE_SEQ' )->nullable();   
            $table->text('TIME_STAMP' )->nullable();   
            $table->text('CODE_PDT' )->nullable();   
            $table->text('DATE_DEM' )->nullable();   
            $table->text('SCORE_NOTE' )->nullable();   
            $table->text('SCORE' )->nullable();   
            $table->text('SCORE_DECISION' )->nullable();   
            $table->text('NIVEAU_DELEG' )->nullable();   
            $table->text('VERSION_SYD' )->nullable();   
            $table->text('VERSION_GRILLE' )->nullable();   
            $table->text('RESULTAT_REGLES' )->nullable();   
            $table->text('RESULTAT_FINAL' )->nullable();   
            $table->text('ID_CLIENT' )->nullable();   
            $table->text('AGE_FIN_CREDIT' )->nullable();   
            $table->text('STATUT' )->nullable();   
            ///policy
            $table->text('MB_RAV_DECISION' )->nullable();   
            $table->text('MB_RAV_MOTIF' )->nullable();   
            $table->text('MB_RAV_RESULTAT' )->nullable();    
            $table->text('MB_TED_DECISION' )->nullable();   
            $table->text('MB_TED_MOTIF' )->nullable();   
            $table->text('MB_TED_RESULTAT' )->nullable();    
            $table->text('ME_AGE_DECISION' )->nullable();   
            $table->text('ME_AGE_MOTIF' )->nullable();   
            $table->text('ME_AGE_RESULTAT' )->nullable();               
            $table->text('ME_ANC_BQ_DECISION' )->nullable();   
            $table->text('ME_ANC_BQ_MOTIF' )->nullable();   
            $table->text('ME_ANC_BQ_RESULTAT' )->nullable();               
            $table->text('ME_ANC_EMP_ACT_DECISION' )->nullable();   
            $table->text('ME_ANC_EMP_ACT_MOTIF' )->nullable();   
            $table->text('ME_ANC_EMP_ACT_RESULTAT' )->nullable();              
            $table->text('ME_CLIENT_HN_DECISION' )->nullable();   
            $table->text('ME_CLIENT_HN_MOTIF' )->nullable();   
            $table->text('ME_CLIENT_HN_RESULTAT' )->nullable();               
            $table->text('ME_PROFESSION_DECISION' )->nullable();   
            $table->text('ME_PROFESSION_MOTIF' )->nullable();   
            $table->text('ME_PROFESSION_RESULTAT' )->nullable();               
            $table->text('ME_REVENU_DECISION' )->nullable();   
            $table->text('ME_REVENU_MOTIF' )->nullable();   
            $table->text('ME_REVENU_RESULTAT' )->nullable();               
            $table->text('ME_SECT_ACT_DECISION' )->nullable();   
            $table->text('ME_SECT_ACT_MOTIF' )->nullable();   
            $table->text('ME_SECT_ACT_RESULTAT' )->nullable();               
            $table->text('MF_DEM_REJ_SLF_DECISION' )->nullable();   
            $table->text('MF_DEM_REJ_SLF_MOTIF' )->nullable();   
            $table->text('MF_DEM_REJ_SLF_RESULTAT' )->nullable();               
            $table->text('MF_FRAUDE_DECISION' )->nullable();   
            $table->text('MF_FRAUDE_MOTIF' )->nullable();   
            $table->text('MF_FRAUDE_RESULTAT' )->nullable();               
            $table->text('MF_INC_BMCE_DECISION' )->nullable();   
            $table->text('MF_INC_BMCE_MOTIF' )->nullable();   
            $table->text('MF_INC_BMCE_RESULTAT' )->nullable();               
            $table->text('MF_INC_CB_DECISION' )->nullable();   
            $table->text('MF_INC_CB_MOTIF' )->nullable();   
            $table->text('MF_INC_CB_RESULTAT' )->nullable();               
            $table->text('MF_INC_FIC_DECISION' )->nullable();   
            $table->text('MF_INC_FIC_MOTIF' )->nullable();   
            $table->text('MF_INC_FIC_RESULTAT' )->nullable();               
            $table->text('MF_INC_SLF_DECISION' )->nullable();   
            $table->text('MF_INC_SLF_MOTIF' )->nullable();   
            $table->text('MF_INC_SLF_RESULTAT' )->nullable();               
            $table->text('MF_INC_TSL_DECISION' )->nullable();   
            $table->text('MF_INC_TSL_MOTIF' )->nullable();   
            $table->text('MF_INC_TSL_RESULTAT' )->nullable();            
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
        Schema::dropIfExists('tbl_decisionnels');
    }
}
