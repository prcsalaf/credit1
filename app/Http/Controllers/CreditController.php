<?php

namespace App\Http\Controllers;

use App\Models\Tbl_credit;
<<<<<<< HEAD
use App\Models\Tbl_Regle;  
use App\Models\Tbl_Decisionnel; 
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;
=======
use App\Models\Tbl_Regle;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
>>>>>>> d5732def0f6e3aee9d399bc77f29d99362990c6f

class CreditController extends Controller
{
    //
    public function add(Request $r)
    {
<<<<<<< HEAD
       try {
         $new = new Tbl_credit();
         $id = (Tbl_credit::all()->last()->id_cred ) + 1; ;
         if ($id == null) {
             $id = 1 ;
         }
         $new->id_cred =  $id;
         $new->cin = $r->cin   ;  // "M418474   " ;      
         $new->nom = $r->nom   ;     //"AIT OMAR" ;
         $new->prenom =$r->prenom   ; //  "MEHDI" ;
         $new->date_nes =$r->dateN  ;// "26/03/1986" ;  
         $new->type = $r->type    ;  
         $new->montant =$r->montant  ; //2000 ;       
         $new->monsualite = $r->monsualite   ;
         $new->projet = $r->projet    ;
         $new->duree = $r->duree    ;
         $new->credit_encour = $r->credit_encour    ;
         $new->nombre_pr = $r->nombre_pr    ;  
         $sex =$r->sexe ; // "M";
 
        
          //Appel premier API cp
          CreditController::API_cp($new , $sex ) ;
        
         //Appel deuxiem api s1
          CreditController::API_s1($new) ;
 
         if($r->file('file_rb')){
              $file_rb = $r->file('file_rb');
              $filename_rb = $new->id_cred . '_rb.' . $r->file('file_rb')->extension();
              $filePath_rb = public_path() . '/assets/pdf/';
              $file_rb->move($filePath_rb, $filename_rb);
         }
         if($r->file('file_fp')){
             $file_fb = $r->file('file_fp');
             $filename_fb = $new->id_cred  . '_fp.' . $r->file('file_fp')->extension();
             $filePath_fb = public_path() . '/assets/pdf/';
             $file_fb->move($filePath_fb, $filename_fb);
        }
 
          //// api coucl cloud 
          CreditController::API_cloud( $new ,$filename_rb ,$filename_fb ) ;
                $new->save();
          return      $new;
 
          //  return  redirect('/') ; //->action([CreditController::class, 'show']);

       } catch (\Throwable $th) {
           throw $th;
       }
        
    }
    public function show() {
        $list = Tbl_credit::all();
        return  response()->json($list)  ;
    } 
    public function API_cp(Tbl_credit $new , $sex ){
          
        $json_cp = '[{
            "V_CIN":"'.$new->cin.'" ,
            "VNom":"'.$new->nom.'" ,
            "VPrenom":"'.$new->prenom.'",
            "VSexe":"'.$sex.'",
            "V_DateNaiss":"'.$new->date_nes.'",
            "MntCredit":'.$new->montant.'
        }]';
         // appel web service  ou plus tot  execute program node.js 
        $result_cp = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/api_cp.js data=".json_encode($json_cp )  );  

        $result_cp =  json_decode( $result_cp ,true  ) ;
        $new->VIDRapport       = $result_cp[0]["VIDRapport"]    ;        
        $new->VCode_err        = $result_cp[0]["VCode_err"]   ; 
        $new->VInfo_negatif     = $result_cp[0]["VInfo_negatif"]   ;          
        $new->VFlag_CB         = $result_cp[0]["VFlag_CB"]   ;        
        $new->R_GRAV_CB        =  trim( explode("-" , $result_cp[0]["R_GRAV_CB"]  )[0])    ;     
        $new->R_GRAV_HIST_SALF = trim( explode("-" , $result_cp[0]["R_GRAV_HIST_SALF"]  )[0])   ;           
        $new->R_GRAV_FIC       =   trim( explode("-" , $result_cp[0]["R_GRAV_FIC"]  )[0])   ; 
        $new->R_GRAV_CDL       = trim( explode("-" , $result_cp[0]["R_GRAV_CDL"]  )[0])    ;  
        $new->VRating          = $result_cp[0]["VRating"]   ; 
        $new->VSCORE_CB         = $result_cp[0]["VSCORE_CB"]   ; 
        $new->VGRADE_SCORE_CB   = $result_cp[0]["VGRADE_SCORE_CB"]   ;          
        $new->R_GRAV_TSL       = trim( explode("-" , $result_cp[0]["R_GRAV_TSL"]  )[0])   ; 
        $new->V_LibAnomalie  = $result_cp[0]["V_LibAnomalie"]   ; 

    } 
    public function API_s1(Tbl_credit $new){
      $newDecisionnel = new Tbl_Decisionnel();

      if (! function_exists ( 'curl_version' )) {
        exit ( "Enable cURL in PHP" );
         }
         
            ///   Variables xml  
        $TIME_STAMP = date("Y-m-d\TH:i:sP") ; //"2021-03-23T14:51:51.229+02:00" ;
        $RESEAU_PRESCRIPTEUR = "Correspondants" ;
        $POINT_DE_VENTE = "agence_internet" ; // valeur fix  agence_internet 
        $APPORTEUR   =   "agence_internet"  ; // valeur fix  agence_internet 
        $CHARGE_DE_DOSSIER   =   "agence_internet"  ; // valeur fix  agence_internet 
        $FACILITE_CAISSE   =  "0"   ; // valeur fix  0 
        $BAREME   =  "xyz"   ; 
        $TYPE_LOGEMENT   =  "location"   ; 
        $MNT_ENG = "15000" ;
        $CODE_PDT   =  "PDT_03"   ; 
        $TAUX   =  "0.9"   ;             // *** 
        $MENSUALITE_RACHAT   =  "0"   ; 
        $MONTANT_RACHAT   =  "0"   ; 
        $RATING_AGENCE_BMCE   =  "b1"   ;  
        $CODE_SEQ   =  $new->id_cred   ; // auto increment uniq 
        $DATEDEM = date('d/m/Y') ; //"06/04/2021" ; 

        // varables 2 xml
        $NBFILS   =  "0"   ;  
        $GRADE   =  "b1"   ;  
        $CODE_PROFESSION   =  "15"   ;   //fix 
        $REVENU_NET   =  "10000"   ;    // valeur fix 10000 ensuite  ficher paie 
        $AUTRE_REVENU   =  "0"   ;   //fix
        $SECTEUR_D_ACTIVITE   =  "S4"   ;   //fix
        $SOLDEFMP   =  "200"   ;   // valeur fix  200  ensuit relve bq 
        $BANQUE   =  "BMCE"   ;  // valeur fix bmce ensuit relvebq 
        $TITRE   =  "Mme"   ;  
        $NATIONALITE   =  "Marocain"   ;   //fix 
        $TYPE_CLIENT   =  "Nouveau"   ;  
        $FONCTION   =  "Employee"   ;  
        $EMPLOYEUR = "CRIF" ;  //fix
        $ANC_CLIENT   =  "non"   ;   //fix non puis webservice 
        $TOTAL_MENS_IMMO   =  "0"   ;   //fix
        $NB_PERS_CHARGE   =  "0"   ;   //fix 0
        $SIT_FAM   =  "C"   ;  
        $MNT_LOYER   =  "1500"   ;  
        $DATECOMPTE   =  "05/04/2016"   ;  //fix ensuit formulair 
        $DATEEMBAUCHE   =  "06/03/2017"   ;   //fix ensuit fich paie


        $xml = '<StrategyOneRequest>
            <Header>
                <InquiryCode>1</InquiryCode>
                <ProcessCode>PROJET_CP_PBQ</ProcessCode>
                <OrganizationCode>SAL</OrganizationCode>
            </Header>
            <Body>
                <Demande>
                    <Variables>
                        <NUM_DOSS>'.$new->id_cred.'</NUM_DOSS>
                        <TIME_STAMP>'.$TIME_STAMP.'</TIME_STAMP> 
                        <MNTDEM>'.$new->montant.'</MNTDEM>  
                        <DUREE>'.$new->duree.'</DUREE>  
                        <RESEAU_PRESCRIPTEUR>'.$RESEAU_PRESCRIPTEUR.'</RESEAU_PRESCRIPTEUR>   
                        <POINT_DE_VENTE>'.$POINT_DE_VENTE.'</POINT_DE_VENTE>     
                        <APPORTEUR>'.$APPORTEUR.'</APPORTEUR>     
                        <CHARGE_DE_DOSSIER>'.$CHARGE_DE_DOSSIER.'</CHARGE_DE_DOSSIER>  
                        <FACILITE_CAISSE>'.$FACILITE_CAISSE.'</FACILITE_CAISSE>   
                        <BAREME>'.$BAREME.'</BAREME>  
                        <TYPE_LOGEMENT>'.$TYPE_LOGEMENT.'</TYPE_LOGEMENT>   
                        <MNT_ENG>'.$MNT_ENG.'</MNT_ENG>   
                        <CODE_PDT>'.$CODE_PDT.'</CODE_PDT>   
                        <TAUX>'.$TAUX.'</TAUX>   
                        <MENSUALITE_RACHAT>'.$MENSUALITE_RACHAT.'</MENSUALITE_RACHAT> 
                        <MONTANT_RACHAT>'.$MONTANT_RACHAT.'</MONTANT_RACHAT> 
                        <RATING_AGENCE_BMCE>'.$RATING_AGENCE_BMCE.'</RATING_AGENCE_BMCE> 
                        <CODE_SEQ>'.$CODE_SEQ.'</CODE_SEQ> 
                        <DATEDEM>'.$DATEDEM.'</DATEDEM> 
                    </Variables>
                    <Categories>
                        <Demandeur>
                            <Variables>
                                <NBFILS>'.$NBFILS.'</NBFILS>   
                                <GRADE>'.$new->VGRADE_SCORE_CB.'</GRADE>    
                                <SCORE_CB>'.$new->VSCORE_CB .'</SCORE_CB>   
                                <CODE_PROFESSION>'.$CODE_PROFESSION.'</CODE_PROFESSION>  
                                <REVENU_NET>'.$REVENU_NET.'</REVENU_NET>    
                                <AUTRE_REVENU>'.$AUTRE_REVENU.'</AUTRE_REVENU>  
                                <SECTEUR_D_ACTIVITE>'.$SECTEUR_D_ACTIVITE.'</SECTEUR_D_ACTIVITE>  
                                <SOLDEFMP>'.$SOLDEFMP.'</SOLDEFMP>  
                                <R_GRAV_HIST_SALF>'.$new->R_GRAV_HIST_SALF.'</R_GRAV_HIST_SALF>  
                                <BANQUE>'.$BANQUE.'</BANQUE>  
                                <R_GRAV_CDL>'.$new->R_GRAV_CDL.'</R_GRAV_CDL> 
                                <R_GRAV_CB>'.$new->R_GRAV_CB.'</R_GRAV_CB>  
                                <R_GRAV_TSL>'.$new->R_GRAV_TSL.'</R_GRAV_TSL> 
                                <R_GRAV_FIC>'.$new->R_GRAV_FIC.'</R_GRAV_FIC>  
                                <TITRE>'.$TITRE.'</TITRE> 
                                <NATIONALITE>'.$NATIONALITE.'</NATIONALITE>  
                                <TYPE_CLIENT>'.$TYPE_CLIENT.'</TYPE_CLIENT>  
                                <FONCTION>'.$FONCTION.'</FONCTION> 
                                <EMPLOYEUR>'.$EMPLOYEUR.'</EMPLOYEUR>  
                                <ANC_CLIENT>'.$ANC_CLIENT.'</ANC_CLIENT> 
                                <TOTAL_MENS_CONSO>'.$new->credit_encour.'</TOTAL_MENS_CONSO> 
                                <TOTAL_MENS_IMMO>'.$TOTAL_MENS_IMMO.'</TOTAL_MENS_IMMO>  
                                <NOUV_MENS>'.$new->monsualite.'</NOUV_MENS> 
                                <NB_PERS_CHARGE>'.$NB_PERS_CHARGE.'</NB_PERS_CHARGE> 
                                <SIT_FAM>'.$SIT_FAM.'</SIT_FAM> 
                                <ID_CLIENT>'.$new->cin.'</ID_CLIENT>  
                                <MNT_LOYER>'.$MNT_LOYER.'</MNT_LOYER>  
                                <RATING_CLIENT>'.$new->VRating.'</RATING_CLIENT>  
                                <DATECOMPTE>'.$DATECOMPTE.'</DATECOMPTE>
                                <DATEEMBAUCHE>'.$DATEEMBAUCHE.'</DATEEMBAUCHE>  
                                <DATENAISS>'.$new->date_nes.'</DATENAISS>  
                            </Variables>
                            <Categories />
                        </Demandeur>
                    </Categories>
                </Demande>
            </Body>
        </StrategyOneRequest>';
            
    
        $ch = curl_init ();
        $timeout = 0; // 100; // set to zero for no timeout
        $myHITurl = "https://stgoneprd.csalafin.com/strategyone/rs/S1Public";
        curl_setopt ( $ch, CURLOPT_URL, $myHITurl );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
    
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        $file_contents = curl_exec ( $ch );
        if (curl_errno ( $ch )) {
            echo curl_error ( $ch );
            curl_close ( $ch );
            exit ();
        }
        curl_close ( $ch );
         
         $xml=simplexml_load_string($file_contents);
         // echo $xml->Header->ProcessVersion ;
           
       // return $xml->Body->Demande->Variables->CODE_SEQ ;
         //Demande->Variables 
         $newDecisionnel->NUM_DOSS             =$xml->Body->Demande->Variables->NUM_DOSS        ;
         $newDecisionnel->CODE_SEQ             =$xml->Body->Demande->Variables->CODE_SEQ         ;
         $newDecisionnel->TIME_STAMP           =$xml->Body->Demande->Variables->TIME_STAMP           ;  
         $newDecisionnel->CODE_PDT             =$xml->Body->Demande->Variables->CODE_PDT        ;
         $newDecisionnel->DATE_DEM              =$xml->Body->Demande->Variables->DATEDEM         ;
         $newDecisionnel->SCORE_NOTE              =$xml->Body->Demande->Variables->PD_CAT       ;
         $newDecisionnel->SCORE     =$xml->Body->Demande->Variables->CATEGORIE_SCORE       ;        
         $newDecisionnel->SCORE_DECISION  =$xml->Body->Demande->Variables->RESULTAT_SCORECARD;           
         $newDecisionnel->NIVEAU_DELEG        =$xml->Body->Demande->Variables->NIVEAU_DELEG       ;     
         $newDecisionnel->VERSION_SYD         =$xml->Body->Demande->Variables->VERSION_SYD       ;    
         $newDecisionnel->VERSION_GRILLE      =$xml->Body->Demande->Variables->VERSION_GRILLE       ;       
         $newDecisionnel->RESULTAT_REGLES     =$xml->Body->Demande->Variables->RESULTAT_REGLES       ;        
         $newDecisionnel->RESULTAT_FINAL      =$xml->Body->Demande->Variables->RESULTAT_FINAL         ;       
         // Demande->Categories ->Demandeur ->Variables 
         $newDecisionnel->ID_CLIENT         =$xml->Body->Demande->Categories->Demandeur->Variables->ID_CLIENT         ;       
         $newDecisionnel->AGE_FIN_CREDIT    =$xml->Body->Demande->Categories->Demandeur->Variables->AGE_A_ECHEANCE         ;       
         $newDecisionnel->STATUT            =$xml->Body->Demande->Categories->Demandeur->Variables->STATUT         ;    
          // Demande->Categories ->Demandeur ->Categories  ->Policy->Variables 
          $Cpolicy = $xml->Body->Demande->Categories->Demandeur->Categories->Policy ;
        //   for ($i=0; $i < count($Cpolicy ) ; $i++) { 
            foreach ($Cpolicy as $value){
              $variables = $value->Variables ;
             if ( $variables->ID == "POLICY_REST" ) {
                $newDecisionnel->MB_RAV_DECISION =  $variables->DECISION ;
                $newDecisionnel->MB_RAV_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MB_RAV_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_SURR_CAR_1"){
                $newDecisionnel->MB_TED_DECISION =  $variables->DECISION ;
                $newDecisionnel->MB_TED_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MB_TED_RESULTAT =  $variables->RESULTAT ;

             }
             elseif( $variables->ID == "POLICY_AGE"){
                $newDecisionnel->ME_AGE_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_AGE_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_AGE_RESULTAT =  $variables->RESULTAT ;

             }
             elseif( $variables->ID == "POLICY_ANZ_COMPTE"){
                $newDecisionnel->ME_ANC_BQ_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_ANC_BQ_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_ANC_BQ_RESULTAT =  $variables->RESULTAT ;

             }
             elseif( $variables->ID == "POLICY_ANZ_EMPLOI"){
                $newDecisionnel->ME_ANC_EMP_ACT_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_ANC_EMP_ACT_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_ANC_EMP_ACT_RESULTAT =  $variables->RESULTAT ;

             }
             elseif( $variables->ID == "POLICY_CLIENT_RIS"){
                $newDecisionnel->ME_CLIENT_HN_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_CLIENT_HN_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_CLIENT_HN_RESULTAT =  $variables->RESULTAT ;

             }
             elseif( $variables->ID == "POLICY_PROF"){
                $newDecisionnel->ME_PROFESSION_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_PROFESSION_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_PROFESSION_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_REVENU"){
                $newDecisionnel->ME_REVENU_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_REVENU_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_REVENU_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_SECT"){
                $newDecisionnel->ME_SECT_ACT_DECISION =  $variables->DECISION ;
                $newDecisionnel->ME_SECT_ACT_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->ME_SECT_ACT_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_DEMANDE_REJ"){
                $newDecisionnel->MF_DEM_REJ_SLF_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_DEM_REJ_SLF_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_DEM_REJ_SLF_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_FRAUDE"){
                $newDecisionnel->MF_FRAUDE_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_FRAUDE_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_FRAUDE_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_INC_BMCE_GRV"){
                $newDecisionnel->MF_INC_BMCE_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_INC_BMCE_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_INC_BMCE_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_INC_CB"){
                $newDecisionnel->MF_INC_CB_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_INC_CB_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_INC_CB_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_INC_FIC"){
                $newDecisionnel->MF_INC_FIC_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_INC_FIC_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_INC_FIC_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_INC_SALAFIN"){
                 
                $newDecisionnel->MF_INC_SLF_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_INC_SLF_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_INC_SLF_RESULTAT =  $variables->RESULTAT ;
             }
             elseif( $variables->ID == "POLICY_GRAV_TSL"){
                $newDecisionnel->MF_INC_TSL_DECISION =  $variables->DECISION ;
                $newDecisionnel->MF_INC_TSL_MOTIF  =    $variables->MOTIF  ;
                $newDecisionnel->MF_INC_TSL_RESULTAT =  $variables->RESULTAT ;
             }

          }
          
           $newDecisionnel->save();
            
        //   print_r($xml->Header->InquiryCode) ; 
        // return   htmlentities( $file_contents)   ;
    }
    public function API_cloud(Tbl_credit $new ,$filename_rb ,$filename_fb ){

      $path_rb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_rb ;
      $path_fb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_fb ;
      $result_rb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/api_ocr_cloud.js pdf=".$path_rb); 
      $result_fb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/api_ocr_cloud.js pdf=".$path_fb);
      $new->Relev_banq =  $result_rb ;
      $new->fichie_paie = $result_fb  ;
    }
   /// just for test 
    public function OCRtst(Request $r){

      if($r->file('file')){
         $file_fb = $r->file('file');
         $filename_fb = time() . '.' . $r->file('file')->extension();
         $filePath_fb = public_path() . '/assets/pdf/';
         $file_fb->move($filePath_fb, $filename_fb);
    }
      
     $path_fb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_fb ;
     $result_rb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/api_ocr_cloud.js pdf=C:/xampp/htdocs/credit/public/assets/pdf/1625666655.pdf");

      echo  $result_rb ;   
     

   
=======
        $new = new Tbl_credit();

        $new->cin = $r->cin   ;
        $new->nom = $r->nom   ;
        $new->prenom = $r->prenom   ;
        $new->date_nes = $r->dateN   ;
        $new->montant = $r->montant    ;
        $new->monsualite = $r->monsualite   ;
        $new->projet = $r->projet    ;
        $new->duree = $r->duree    ;
        $new->credit_encour = $r->credit_encour    ;
        $new->nombre_pr = $r->nombre_pr    ;


        if($r->file('file_rb'))
        {
             $file_rb = $r->file('file_rb');
             $filename_rb = time() . '.' . $r->file('file_rb')->extension();
             $filePath_rb = public_path() . '/assets/pdf/';
             $file_rb->move($filePath_rb, $filename_rb);
       }
       if($r->file('file_fp'))
       {
            $file_fb = $r->file('file_fp');
            $filename_fb = time() . '.' . $r->file('file_fp')->extension();
            $filePath_fb = public_path() . '/assets/pdf/';
            $file_fb->move($filePath_fb, $filename_fb);
      }


      $path_rb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_rb ;
      $path_fb = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename_fb ;
      $result_rb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path_rb);
      $result_fb = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path_fb);
      $new->Relev_banq =  $result_rb ;
      $new->fichie_paie = $result_fb  ;
        $new->save();
        return $new;
   //  return  redirect('/') ; //->action([CreditController::class, 'show']);
    }
    public function show()
    {
        $list = Tbl_credit::all();
        return  response()->json($list)  ;
    }

    public function OCRtst(Request $r){


        if($r->file('file'))
        {
            $file = $r->file('file');
            $filename = $r->cin. '.' . $r->file('file')->extension();
            $filePath = public_path() . '/assets/pdf/';
            $file->move($filePath, $filename);

        }
        if($r->file('file_rv'))
        {
            $file_rv = $r->file('file_rv');
            $file_rvname = $r->rv. '.' . $r->file('file_rv')->extension();
            $file_rvPath = public_path() . '/assets/pdf/';
            $file_rv->move($file_rvPath, $file_rvname);

        }

        $path = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$filename ;
        $path1 = 'C:/xampp/htdocs/credit/public/assets/pdf/'.$file_rvname ;
        //traitemen
          $result = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path);
          $result1 = shell_exec("node C:/xampp/htdocs/credit/public/assets/js/apiocr.js pdf=".$path1);

        //traitemen
        // $result = shell_exec("node ocr_main.js pdf=".$file);

     return  $result.'  <br/><br/><br/><br/><hr/><br/><br/>'.$result1 ;
   //   return   $r ;

    }

      public function t( )
      {
           $DocumentProcessorServiceClient = require('@google-cloud/documentai');
>>>>>>> d5732def0f6e3aee9d399bc77f29d99362990c6f

    }

}
