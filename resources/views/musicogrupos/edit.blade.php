@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Musicogrupos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($musicogrupos, ['route' => ['musicogrupos.update', $musicogrupos->id], 'method' => 'patch']) !!}

                        @include('musicogrupos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection