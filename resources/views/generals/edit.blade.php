@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            General
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($general, ['route' => ['generals.update', $general->id], 'method' => 'patch']) !!}

                        @include('generals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection