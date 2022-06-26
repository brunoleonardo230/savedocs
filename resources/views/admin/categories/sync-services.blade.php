<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sincronizar Categoria:') }} <strong>{{$category->name}}</strong> aos serviços
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('categories.services.update', $category->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row form-group">
            <div class="col-md-4 pt-4 pb-4">
                @foreach($services as $service)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="services[]"
                            class="custom-control-input"
                            id="customCheck{{$service->id}}"
                            value="{{$service->id}}"
                            @if($category->services->contains($service)) checked @endif
                        >
                        <label class="custom-control-label" for="customCheck{{$service->id}}"> <strong>{{$service->name}}</strong></label>
                    </div>
                @endforeach
            </div>

        </div>

        <hr>

        <div class="form-group text-right">
            <a href="{{route('categories.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success" type="submit"> Sincronizar </button>
        </div>
    </form>

</x-app-layout>