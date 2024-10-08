@extends('home')
<!-- utilizando el yield de la vista principal (home)-->
@section('content')
    <h2 class="title">Gestion de alojamientos</h2>
    {{-- @php
    //testeando si la informacion esta llegando
        print_r($accomodations);
    @endphp --}}
    <div class="container_accomodations">
        @if (count($accomodations) > 0)
        @foreach ($accomodations as $item)
        <h3>{{ $item['name'] }}</h3>
            <div class="card">
                <img src="{{$item->image}}" alt="">
                <h3>{{ $item['name']}}</h3>
                <p><strong>Direccion:</strong>{{ $item->address }}</p>
            </div>
        @endforeach    
        @else
        <h3>No hay alojamientos...</h3>
            
        @endif
        <!--Iterando la informacion de los alojamientos-->
       
    </div>
@endsection