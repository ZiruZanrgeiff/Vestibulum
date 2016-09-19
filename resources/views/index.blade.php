@extends('layouts.default')
@section('title', 'Vestibulum | Static code Analisys')

@section('content')
  <div class="vestibulum-content">
    <div class="col-md-3 stiker">
      <div class="img-container"> <div class="text-center pull-right photo">
          <img src="{{ asset('images/stiker.png') }}"
               class="user-avatar img-circle img-responsive"
          />
          <h1>Vestibulum<small>Get out fast!</small></h1>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-md-offset-3">
      <div class="processor-vestibulum"  ng-controller="vestibulumController" >
        <form name="form" enctype="multipart/form-data">

          <div ngf-drop="upload($file)"
               ngf-select="upload($file)"
               class="drop-box"
               ngf-drag-over-class="'dragover'"
               ngf-multiple="true"
          >
            <div>Select or Drop File</div>
          </div>
          <div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
        </form>
        <div ng-bind-html="trustedHtml" id="divID">
        </div>
      </div>

    </div>
  </div>
@endsection