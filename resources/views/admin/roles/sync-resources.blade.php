<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atribuir permissões ao perfil:') }} <strong>{{$role->name}}</strong> 
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form action="{{route('roles.resources.update', $role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-4 pt-4 pb-4">
                        @foreach($resources as $resource)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                    name="resources[]"
                                    class="custom-control-input"
                                    id="customCheck{{$resource->id}}"
                                    value="{{$resource->id}}"
                                    @if($role->resources->contains($resource)) checked @endif
                                >
                                <label class="custom-control-label" for="customCheck{{$resource->id}}"> <strong>{{$resource->name}}</strong> <small><span class="badge badge-primary">{{$resource->resource}}</span> </small>   </label>
                            </div>
                        @endforeach
                    </div>
        
                </div>
        
                <div class="form-group text-right mt-5">
                    <a href="{{route('roles.index')}}" class="btn btn-danger"> Cancelar </a>
                    <button class="btn btn-success" type="submit"> Atualizar </button>
                </div>
            </form>
            
        </div>
    </div>


</x-app-layout>