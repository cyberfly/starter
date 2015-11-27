@extends('admin.layouts.default')

@section('content')

<div class="row">
  <div class="col-md-6">
    <!-- paste your content here -->

    <!-- if there are creation error, warning will show  -->
    {{HTML::ul($errors->all())}}

    <div class="page-header">
      <h3>
        Edit Approved Sites

        <div class="pull-right">
          <a class="btn btn-small btn bg-danger iframe cboxElement" href="{{URL::to('admin/approvedsites/')}}"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
        </div>

      </h3>
    </div>


    {{ Form::open(array('route' => array('admin.approvedsites.update', $approvedsite->id), 'method'=>'PUT', 'files'=>true)) }}

    <!-- {{ Form::open(array('route' => 'admin.approvedsites.store')) }} -->

    <div class="form-group">

      {{Form::label('agcode', 'Kod Pusat Ujian')}}
      {{ Form::text('agcode',$approvedsite->agcode, array('class'=>'form-control')) }}

    </div>

    <div class="form-group">

      {{Form::label('agname', 'Pusat Ujian')}}
      {{ Form::text('agname',$approvedsite->agname,array('class'=>'form-control')) }}

    </div>

    <div class="form-group">

      {{Form::label('add1', 'Alamat')}}
      {{ Form::text('add1',$approvedsite->add1,array('class'=>'form-control')) }}
      <br>
      {{ Form::text('add2',$approvedsite->add2,array('class'=>'form-control')) }}
      <br>
      {{ Form::text('add3',$approvedsite->add3,array('class'=>'form-control')) }}

    </div>


    <div class="form-group">

      {{Form::label('city', 'Bandar')}}
      {{ Form::text('city',$approvedsite->city,array('class'=>'form-control')) }}

    </div>

    <div class="form-group">

      {{Form::label('postcode', 'Poskod')}}
      {{ Form::text('postcode',$approvedsite->postcode,array('class'=>'form-control')) }}

    </div>

    <div class="form-group">
      {{Form::label('state', 'Negeri')}}
      {{ Form::select('state', $states,$approvedsite->state, array('class'=>'form-control')) }}
      <!-- {{ Form::text('state',$approvedsite->state,array('class'=>'form-control')) }} -->
      <!-- {{ Form::select('state', array('01' => 'Johor', '02' => 'Kedah','03' => 'Kelantan', '04' => 'Melaka', '05' => 'Negeri Sembilan', '06' => 'Pahang','07' => 'Pulau Pinang', '08' => 'Perak', '09' => 'Perlis', '10' => 'Selangor','11' => 'Terengganu', '12' => 'Sabah', '13' => 'Sarawak','14' => 'Wilayah Persekutuan Kuala Lumpur', '15' => 'Wilayah Persekutuan Putrajaya', '16' => 'Wilayah Persekutuan Labuan'), '01',array('class'=>'form-control')) }} -->
      <!-- {{ Form::select('state', array('Johor' => 'Johor', 'Kedah' => 'Kedah','Kelantan' => 'Kelantan', 'Melaka' => 'Melaka', 'Negeri Sembilan' => 'Negeri Sembilan', 'Pahang' => 'Pahang','Pulau Pinang' => 'Pulau Pinang', 'Perak' => 'Perak', 'Perlis' => 'Perlis', 'Selangor' => 'Selangor','Terengganu' => 'Terengganu', 'Sabah' => 'Sabah', 'Sarawak' => 'Sarawak','Wilayah Persekutuan Kuala Lumpur' => 'Wilayah Persekutuan Kuala Lumpur', 'Wilayah Persekutuan Putrajaya' => 'Wilayah Persekutuan Putrajaya', 'Wilayah Persekutuan Labuan' => 'Wilayah Persekutuan Labuan'), 'Johor',array('class'=>'form-control')) }} -->

    </div>

    <div class="form-group">

      {{Form::label('tel', 'No Telefon')}}
      {{ Form::text('tel',$approvedsite->tel,array('class'=>'form-control')) }}

    </div>

    <div class="form-group">

      {{Form::label('fax', 'No Faks')}}
      {{ Form::text('fax',$approvedsite->fax,array('class'=>'form-control')) }}

    </div>

    <div class="form-group">

      {{Form::label('email', 'E-Mail')}}
      {{ Form::text('email',$approvedsite->email,array('class'=>'form-control')) }}

    </div>


    <br>
    <br>
    <br>

        {{ Form::submit('Submit Form',array('class'=>"btn bg-danger")) }}<span class="glyphicon glyphicon-ok"></span>

    {{ Form::close() }}

    <!-- end of content -->

  </div>

</div>


@stop

@stop
