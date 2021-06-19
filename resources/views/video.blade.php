{{-- @extends('layouts.master')  --}}
<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}">
    <head>
      <meta charset="utf-8"/>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Video Viewers  </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet"/>
        <style>
          
          .flex-center {
              align-items: center;
              margin-top: 100px ;
          }
          .content {
              text-align: center;
          }
      </style>
      </head>

    <body>
      <div class="flex-center">
        <div class="content">
            <div class="title mb-2">
              <h4> Video Viewer ({{$data->viewers}}) </h4>
            </div>  
            <iframe width="560" height="315" src="https://www.youtube.com/embed/GiNWNd_Qpnk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </body>
</html>

