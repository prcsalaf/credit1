current_color = $(".wizard-card").data("color");
full_color = true;

$(document).ready(function () {
    $(".fixed-plugin a, .fixed-plugin .badge").click(function (event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    });

    $(".fixed-plugin .badge").click(function () {
        $wizard = $(".wizard-card");
        $button_next = $(".wizard-card .wizard-footer").find(
            ".pull-right :input"
        );

        $(this).siblings().removeClass("active");
        $(this).addClass("active");

        var new_color = $(this).data("color");

        $wizard.fadeOut("fast", function () {
            $wizard.attr("data-color", new_color);
            $button_next
                .removeClass(converterColor(current_color))
                .addClass(converterColor(new_color));

            current_color = new_color;
            $wizard.fadeIn("fast");
        });
    });

    function converterColor(color) {
        switch (color) {
            case "blue":
                return "btn-info";
                break;
            case "orange":
                return "btn-warning";
                break;
            case "azure":
                return "btn-primary";
                break;
            case "red":
                return "btn-danger";
                break;
            case "green":
                return "btn-success";
                break;
        }
    }
});

// partie de brogressbar de credit   dure , mensualite , montant ;

    //  default  disabled input trange
    $('.montant').css({'cursor': 'no-drop'}).attr('disabled','disabled') ;
    $('.mensualite').css({'cursor': 'no-drop'}).attr('disabled','disabled') ;
    $('.duree').css({'cursor': 'no-drop'}).attr('disabled','disabled') ;
$('.type').on('change',function(){
 // enable the range
    $('.montant').css({'cursor': 'pointer'}).removeAttr('disabled') ;
    $('.mensualite').css({'cursor': 'pointer'}).removeAttr('disabled') ;
    $('.duree').css({'cursor': 'pointer'}).removeAttr('disabled') ;
  //  set regle the range
    var ind = $(this).val() ;
    var list  = window.laravel.rgls ;
     Regle_v = list.find(element => element.type  == ind  );
  // set value
      var mensulaite_max =     getMens( Regle_v.min_mont  , Regle_v.taux  , Regle_v.min_dure )  ;
      var duree_max = getdure( Regle_v.min_mont   , Regle_v.taux  , Regle_v.min_mens );

      $('.montant').attr({'max' : Regle_v.max_mont ,'min' :  Regle_v.min_mont }).val(  Regle_v.min_mont  ) ;
      $('.mensualite').attr({'max' : mensulaite_max,'min' :  Regle_v.min_mens }).val(  Regle_v.min_mens   ) ;
    if (duree_max  > Regle_v.max_dure ) {
      $('.duree').attr({'max' : Regle_v.max_dure  ,'min' :  Regle_v.min_dure }).val(   Regle_v.max_dure   );
    }else{
       $('.duree').attr({'max' : duree_max  ,'min' :  Regle_v.min_dure }).val(   duree_max  );
    }
});
// set value input
$(document).on('input', ".montant" ,  function( ) {
    $('.montant').val($(this).val()   );
     reglmens();
     console.log('fin***********************************');
});
$(document).on('input', ".mensualite"  ,function(){
    console.log("index //"+this.value);
    $('.mensualite').val(  $(this).val() ) ;
    //  calul montant de credit

    var result = getdure( $('.montant').val(), Regle_v.taux  , $(this).val()  );

    var duree_max = getdure( $('.montant').val(), Regle_v.taux  , $('.mensualite').attr('min') );
    if (duree_max  > Regle_v.max_dure ) {
      $('.duree').attr({'max' :  Regle_v.max_dure  }).val(   result  );
    }else{
        $('.duree').attr({'max' : duree_max    }).val(   result  );
    }
});

$(document).on('input', ".duree" ,function(){
    $('.duree').val(   $(this).val()   ) ;
    var result = getMens( $('.montant').val() , Regle_v.taux ,  $(this).val()  );
    $('.mensualite').val(  result);
});
// function calcul la mensualite , le credit  et la duree
function getMens(mont , taux , dure ){
    var nume =  ( mont * taux ) / 12  ;
    var mens = nume / (1- Math.pow((1+ (taux /12) ) , -dure )  ) ;
    return mens.toFixed(2);
}
function getdure(mont , taux , mens){
    var rls1 =     Math.log10 ( - mens / (( taux / 12 * mont) - mens ) )  ;
    var rls2 =    Math.log10( 1 + taux /12 )   ;
    var reslt = rls1 / rls2 ;
    return Math.ceil(reslt) ;
}
function getMont(mens , taux , dure){
    var result_ = ( 12 * mens * ( 1 - Math.pow ( 1 + ( taux /12 ) , -dure )) ) / taux ;
    return result_;
}
function reglmens() {
    // calcul la mensualite
    var result = getMens($('.montant').val() , Regle_v.taux  , $('.duree').val() );
    // calcul la mensualite dans la duree minimale  et maximale
    var mensulaite_min =    getMens($('.montant').val() , Regle_v.taux  , Regle_v.max_dure )  ;
    var mensulaite_max =    getMens($('.montant').val() , Regle_v.taux  , Regle_v.min_dure )   ;
    var duree_max = '';
    var duree_ =getdure( $('.montant').val(), Regle_v.taux  ,  result );
    // si le min mensualite infireur de min mensualite general
        if ( mensulaite_min <  Regle_v.min_mens ) {
            //   change dure
            $('.mensualite').attr({'max' : mensulaite_max , 'min' : Regle_v.min_mens  }).val(   Regle_v.min_mens     ) ;
            duree_max = getdure( $('.montant').val(), Regle_v.taux  ,  Regle_v.min_mens );
        }
        else{
            $('.mensualite').attr({'max' : mensulaite_max , 'min' : mensulaite_min }).val(  result   ) ;
            duree_max = getdure( $('.montant').val(), Regle_v.taux  , mensulaite_min );
        }
      // si le min duree infireur de min duree general
        if (duree_  < Regle_v.max_dure ) {
           $('.duree').attr({'max' : duree_max , 'value' : duree_  }).val( duree_ ) ;

         }
         else{
          $('.duree').attr({'max' :  Regle_v.max_dure , 'value' : Regle_v.max_dure    }).val( Regle_v.max_dure );

        }
}
$(document).on('keypress',function(e) {
     if(e.which == 13) {
           e.preventDefault();
      }
});
//  button submit
$('.btn-finish').click(function(e){
    // e.preventDefault();
    $(this).submit();
});
