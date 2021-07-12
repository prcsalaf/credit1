<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="pdf/upload" method="post" enctype="multipart/form-data" >

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="file" name="file" accept=".pdf" >
        <input type="text" name="cin" >

        <br>

<<<<<<< HEAD
   
=======
        <input type="file" name="file_rv" accept=".pdf" >
        <input type="text" name="rv" >
>>>>>>> d5732def0f6e3aee9d399bc77f29d99362990c6f
      <input type="submit" value="ok">


    </form>



    <button> get api </button>

    <H1> Result : </H1>

    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script  >



// api python

$("button").click(function(){

    $.ajax({
    type: 'post',
    url: "http://192.168.1.80:5000/",
    dataType: "jsonp",
    success: function( response ) {
        console.log( response ); // server response
    }


});
  });

    </script>





</body>
</html>
