@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Generosgrupos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($generosgrupos, ['route' => ['generosgrupos.update', $generosgrupos->id], 'method' => 'patch']) !!}

                        @include('generosgrupos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection