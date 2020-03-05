@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Grupos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($grupos, ['route' => ['grupos.update', $grupos->id], 'method' => 'patch']) !!}

                        @include('grupos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection