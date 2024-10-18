@extends('home')
<!-- utilizando el yield de la vista principal (home)-->
@section('content')
    <h2 class="title">Gestion de alojamientos</h2>
    {{-- @php
    //testeando si la informacion esta llegando
        print_r($accomodations);
    @endphp --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Registrar Alojamiento
    </button>
    <div class="container_accomodations">
        @if (count($accomodations) > 0)
            @foreach ($accomodations as $item)
                <div class="card">

                    <img src="{{ $item->image }}" alt="">
                    <h3>{{ $item['name'] }}</h3>
                    <p><strong>Direccion:</strong>{{ $item->address }}</p>
                </div>
            @endforeach
        @else
            <h3>No hay alojamientos...</h3>
        @endif
        <!--Iterando la informacion de los alojamientos-->

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Alojamiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('saveAccomodation') }}" method="POST" enctype="multipart/form-data">
                    <!--enctype="multipart/form-data" se utiliza cuando subimos un tipo de archivo osea cuando no solo almacenaremos text-->
                    <!--Protegemos la sesion-->
                    @csrf
                <div class="modal-body">
                    <label for="">Alojamiento</label>
                    <input type="text" class="form-control" name="accomodation" value="{{ old('accomodation') }}">
                    @error('accomodation');
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" name="address">
                    @error('address');
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="">Descripcion</label>
                    <textarea type="text" class="form-control" name="description" cols="30" rows="5"></textarea>
                    @error('description');
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="">Subir Imagen</label>
                    <input type="file" class="form-control" name="image">
                    @error('image');
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
            </div>
        </div>
    </div>


@endsection
