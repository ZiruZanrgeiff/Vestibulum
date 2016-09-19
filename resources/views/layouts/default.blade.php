<!DOCTYPE html>
<html lang="en" ng-app="vestibulum">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>@yield('title')</title>

  <!-- Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous" />

  <style>
    body{
      background-color: #1da1f2;
      color: #FFF;
    }

    .stiker{
      position: fixed;
      top: 0;
      bottom: 0;
      background-color: rgb(96, 185, 241);
    }

    .stiker-content {
      overflow: auto;
      display: table;
      width: 100%;
      height: 100%;
      background: #1abc9c;
      color: #fff;
      padding: 3em;
      position: relative;
    }

    footer {
      position: absolute;
      color: #FFF;
      right: 10px;
      bottom: 10px;
      opacity: .7;
    }
    .copy-team{
      margin: 0px;
    }

    .copy-team > a{
      color: #FFF;
    }

    .login-page h1 {
      font-weight: 700;
      line-height: 32px;
      font-size: 34px;
    }

    .img-container h1 small {
      color: #fff;
      opacity: .7;
      padding-right: 5px;
      font-size: 16px;
      display: block;
      margin-top: 8px;
    }

    .img-container img {
      display: inline;
      border: 5px solid #1da1f2;
    }

    .container-fluid, .img-container{
      padding-top: 50px;
    }

    .col-md-8.col-md-offset-3 {
      /*padding-top: 75px;*/

    }

    .drop-box {
      background: #337ab7;
      border: 5px dashed #286090;
      text-align: center;
      padding: 15px;
      cursor: pointer;
      font-weight: bold;
      font-size: 22px;
      opacity: 0.7;

      margin-bottom: 30px;
    }

    .drop-box.dragover{
      background: #26943a;
      border: 5px dashed #2bb742;
    }

    span.variable.language.php-tag.animate {
      color: #815ba4;
    }

  </style>
  <link rel="stylesheet" href="{{ asset('css/paraiso-dark.css') }}">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
</head>

<body>
<div class="container-fluid">
  <div class="row">@yield('content')</div>
</div>
{{--<footer>--}}
  {{--<div>--}}
    {{--<p class="copy-team">&copy; {{ date("Y") }} - <a href="#">@ZiruZanrgeiff</a>; Made with all love in the world.</p>--}}
  {{--</div>--}}
{{--</footer>--}}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></body>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>

<!-- AngularJS Application Scripts -->
<script src="{{ asset('app/app.js') }}"></script>
<script src="{{ asset('app/controllers/vestibulum.js') }}"></script>

<!-- shim is needed to support non-HTML5 FormData browsers (IE8-9)-->
<script src="{{ asset('app/lib/ng-file-upload/ng-file-upload-shim.min.js') }}"></script>
<script src="{{ asset('app/lib/ng-file-upload/ng-file-upload.min.js') }}"></script>

<script src="{{ asset('js/lib/rainbow-custom.min.js') }}"></script>

</html>