@extends('layouts.master')

@section('title', 'Project Create')
@section('extraStyle')
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

@endsection
@section('content')
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="{{URL::Route('flat.index')}}">Flats</a></li>
        <li class="active">Create</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <!-- BEGIN HORIZONTAL FORM -->
          <div class="row">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('flat.store')}}"
                    method="POST"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Flat Allocation</header>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      {{ csrf_field() }}
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          {!! Form::select('projectType', ['' => '', 'Commerical' => 'Commerical','Residential' =>'Residential','Residential & Commerical' => 'Residential & Commerical'], null, ['id' => 'projectType' ,'class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="projectType">Project Type</label>
                          <p class="help-block"></p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <select id="projects_id" class="form-control select2-list" name="projects_id" required>
                            <option value=""></option>
                          </select>
                          <label for="projectType">Project</label>
                          <p  id="projects_id-error" class="help-block">select a project</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker" value="{{$today->format('d/m/Y')}}" name="entryDate" required>
                          <label for="dateOfEntry">Date of entry</label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          {!! Form::select('floor', $floors, null, ['id' =>'floor', 'class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="floor">Floor</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          {!! Form::select('type', $types, null, ['id' =>'floorType' ,'class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="floor">Flat Type</label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" id="flatSize" class="form-control"  name="size" data-rule-number="true" required>
                          <label for="size">Flat size(Sft.)</label>
                          <p class="help-block">Numbers only</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio"  name="parking" checked value="No"><span>No</span>
                          </span>
                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio"  name="parking" value="Yes"><span>Yes</span>
                          </span>
                          <label for="parking">Parking</label>

                        </div>
                      </div>
                      <div class="col-lg-6" id="haveParking" style="display: none">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="parkingNo" data-rule-number="true" required>
                          <label for="parkingNo">Parking no</label>
                          <p class="help-block">Numbers only</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <textarea class="form-control" id="description"  placeholder="Description" name="description" rows="1"  maxlength="1000"></textarea>
                          <p class="help-block">Description</p>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                    </div>
                  </div><!--end .card-body -->
                  <div class="card-actionbar">
                    <div class="card-actionbar-row">
                      <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Create</button>
                    </div>
                  </div>
                </div><!--end .card -->
              </form>
            </div><!--end .col -->
          </div><!--end .row -->
          <!-- END HORIZONTAL FORM -->
        </div>
      </section>
    </div>

  </section>

@endsection

@section('extraScript')
  <script src="{{url('/')}}/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>
  <script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
  <script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

  <script type="text/javascript">
      var generateDescription = function () {
          var desc = "";
          var floor = $('#floor option:selected').text();
          var floorType = $('#floorType option:selected').text();
          var floorSize = $('#flatSize').val();
          if(floor){
              desc += floor;
          }
          if(floorType){
              desc += ","+floorType;
          }
          if(floorSize){
              desc += ","+floorSize+" Sft";
          }
          //console.log(desc);
          $('#description').val(desc);
      };
      $( document ).ready(function() {
          $('select').select2();
          $('#projectType').change(function () {
              $.getJSON("/project-by-type/"+$(this).val(),function (response) {
                  if(response.length){
                      $("#projects_id").empty();
                      var option = '<option value=""></option>';
                      $("#projects_id").append(option);
                      $.each(response,function (index,project) {
                          var option = '<option value="'+project.id+'">'+project.value+'</option>';
                          $("#projects_id").append(option);
                      });

                  }
                  else {
                      $("#projects_id").empty();
                      var option = '<option value=""></option>';
                      $("#projects_id").append(option);
                  }
                  $('#projects_id').select2();
              });
          });
          $('.datepicker').datepicker({
              format: 'dd/mm/yyyy',
              autoclose: true,
              todayHighlight : true

          });
          $('.radio-styled').click(function () {
              $(this).children('input').attr('checked', true);
              if($(this).children('input').val() == "Yes"){
                  $('#haveParking').show();
              }
              else{
                  $('#haveParking').hide();
              }
          });
          generateDescription();
          $('#floor').change(function () {
              generateDescription();

          });
          $('#floorType').change(function () {
              generateDescription();

          });
          $('#flatSize').on('input propertychange paste',function () {
              generateDescription();
          });
          $('form').submit(function (e) {
              e.preventDefault();
              if($('#projects_id').val()){
                  if($('#flatSize').val()){
                      this.submit();

                  }
                  else{
                      $('#flatSize').parent().addClass('has-error');
                      $('#flatSize').focus();
                  }
              }
              else{
                  $('#projects_id').parent().addClass('has-error');
                  $('#projects_id').focus();
              }
          });
      });
  </script>
@endsection
