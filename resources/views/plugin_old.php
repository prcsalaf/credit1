<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>Salafin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->

     <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/rangestyle.css">
    {{-- <link rel="stylesheet" href="assets/css/styleScan.css"> --}}



    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

<!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />


</head>

<body>

    <div class="image-container set-full-height" style="background-image: url('assets/img/paper-2.jpeg')" id="app">


        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">


                            <form action="credit/ajouter" method="post" enctype="multipart/form-data" id="form">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!--        You can switch " data-color="green" "  with one of the next bright colors: "blue", "azure", "orange", "red"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title text-primary">Simulez votre crédit</h3>
                                </div>
                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1"
                                            aria-valuemax="4" style="width: 15%;"></div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#tap1" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-map"></i>
                                                </div>
                                                Produit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tap2" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-panel"></i>
                                                </div>

                                                Progress
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tap3" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-direction-alt"></i>
                                                </div>
                                                Saisir
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tap4" data-toggle="tab">
                                                <div class="icon-circle">
                                                    <i class="ti-upload"></i>
                                                </div>
                                                Upload
                                            </a>
                                        </li>

                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tap1">
                                        <h5 class="info-text">Quelle est votre profession? </h5>
                                        <div class="row">
                                        <div class="form-group  mr-tp2 ">
                                                <div class="form-group col-sm-offset-2 col-sm-8">
                                                    <select class="form-control type" name="type">
                                                        <option disabled="" selected="">- Professions -
                                                        </option>
                                                        @foreach ($regless as $regle)

                                                        <option value="{{ $regle->type}}"> {{ $regle->type }}</option>

                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            
                                            <div class="col-sm-8 col-sm-offset-2">
                                            <h5 class="info-text">Quel est votre besoin? </h5>
                                                <input type="hidden" name="projet" class="d-nonee" >
                                                <div class="col-sm-6  ">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="sf" value="Cash">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-money"></i>
                                                            <p>Prêt personnel</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="sf" value="Automobile">
                                                        <div class="card card-checkboxes card-hover-effect">
                                                            <i class="ti-car"></i>
                                                            <p>Automobile</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tap2">
                                        <div class="row"> 
                                            <div class="col-sm-12">
                                               <h5 class="info-text">Quel est votre besoin? </h5>
                                                <div class="vertically-stacked-slider form-group ">

                                                    <label for="montant">MONTANT SOUHAITÉ </label>
                                                    <label class="elem-right   ">
                                                        <input type="number" value="0.00" step="500"
                                                            class="form-control  input-grab montant disable_"> dh </label>
                                                    <input type="range" name="montant" value="0" min="0" max="0"
                                                        step="500" class="montant disable_">
                                                </div>
                                                <div class="vertically-stacked-slider  ">
                                                    <label for="mensualite"> MENSUALITÉ</label>
                                                    <label class="elem-right ">
                                                        <input type="number" value="0.00" min="0"  step="1" name="monsualite"
                                                             class="form-control input-grab mensualite1 disable_"> dh </label>
                                                        <input type="range" value="0" min="0"  step="1" class="mensualite2 disable_">

                                                </div>
                                                <div class="vertically-stacked-slider  ">
                                                    <label for="duree"> DURÉE</label>
                                                    <label class="elem-right ">
                                                        <input type="number" value="0"  step="1" class="form-control  input-grab input-grab-last duree disable_">  mois</label>
                                                        <input type="range"  value="0"  step="1" class="duree disable_" name="duree">

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tap3">

                                        <div class="row">
                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Crédit en cour</label>
                                                    <input type="text" class="form-control" name="credit_encour"
                                                        placeholder="Ex : 1000">
                                                </div>
                                            </div>

                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Nombre de personne </label>
                                                    <select class="form-control" name="nombre_pr">
                                                        <option disabled="" selected="">- 0 -</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Rien!!</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="rien §§§§">
                                                </div>
                                            </div>
                                            <div class="mr-tp2">
                                                <div class="form-group">
                                                    <label>Rien!!</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="rien §§§§">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tap4">
                                        <h5 class="info-text" id="msg">Scanner ou choisir </h5>
                                        <div class="row ">

                                            <div class="   col-md-11 custom-button " id="creen-start">
                                                <div class="form-group custom-group">
                                                <input type="file" id="image-file" accept="image/*" capture="environment" class="d-none invisible"/>
                                                     
                                                    <input type="hidden" name="cin" id="cin">
                                                    <input type="hidden" name="nom" id="nom" class="d-none">
                                                    <input type="hidden" name="prenom" id="prenom" class="d-none">
                                                    <input type="hidden" name="dateN" id="dateN" class="d-none">
                                                    <input type="hidden" name="sexe" id="sexe" class="d-none">

                                                    <p id="txt-cin" > CIN </p>
                                                    <button id="btn-cin" >     <i class="ti-camera"></i></button>
                                                    <button id="btn-cin-image" >     <i class="ti-image"></i></button>
                                                </div>
                                            </div>
                                            <div class="  col-md-11 custom-button " >
                                                <div class="form-group custom-group">
                                                    <input type="file" id="file-rb" name="file_rb" accept=".pdf" class="d-none invisible " />

                                                    <p id="txt-rb"  >   Relevé bancaire</p>
                                                    <button  id="btn-rb"  > <i class="ti-camera"></i>   </button>
                                                    <button  id="btn-rb-pdf"  > <i class="ti-image"></i>   </button>
                                                </div>
                                            </div>
                                            <div class="  col-md-11 custom-button ">
                                                <div class="form-group custom-group">
                                                    <input type="file" id="file-fp" name="file_fp" accept=".pdf" class="d-none invisible" />

                                                    <p id="txt-fp"> Fiche de paie</p>
                                                    <button  id="btn-fp"> <i class="ti-camera"></i> </button>
                                                    <button  id="btn-fp-pdf"> <i class="ti-image"></i> </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- button  -->
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next'
                                            value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd'
                                            name='finish' value='Finish' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous'
                                            value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>

                              <!--blinkid image -->
                              <img id="target-image"  class='d-none' />
                              <!--blinkid capture -->
                            <progress id="load-progress" class="d-none" value="0" max="100"></progress>
                               <div id="screen-scanning" class="d-none">
                                    <video id="camera-feed" playsinline></video>
                                    <!-- Recognition events will be drawn here. -->
                                    <canvas id="camera-feedback"></canvas>
                                    <p id="camera-guides">Point the camera towards front side of a document.</p>
                                </div>

                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->


    </div>


</body>

<script  type="text/ecmascript">
     // start default traitement
    window.laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'url' => url('/') ,
        'rgls' => $regless
        ])
!!} ;

</script>

<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/demo.js" type="text/javascript"></script>
<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="assets/js/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Sdk blibkid  -->
<script>
        var firstname_ ="";
        var lastname_ ="";
        var dateOfBirth_ ="";
        var cin_ ="";
        var sex_ ="";
        var valeur = "";

  </script>
  
  <script src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.11.4/dist/blinkid-sdk.js"></script>
  <script src="assets/js/apicin.js"></script>
  <script src="https://unpkg.com/@microblink/blinkid-in-browser-sdk@5.12.0/dist/blinkid-sdk.js"></script>

  <script src="assets/js/api_blink_file.js"></script>




</html>
