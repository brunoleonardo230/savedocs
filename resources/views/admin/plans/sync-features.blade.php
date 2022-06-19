<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sincronizar Plano:') }} <strong>{{$plan->name}}</strong> aos recursos
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('plans.features.update', $plan->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row form-group">
            <div class="col-md-4 pt-4 pb-4">
                @foreach($features as $feature)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="features[]"
                            class="custom-control-input"
                            id="customCheck{{$feature->id}}"
                            value="{{$feature->id}}"
                            @if($plan->features->contains($feature)) checked @endif
                        >
                        <label class="custom-control-label" for="customCheck{{$feature->id}}"> <strong>{{$feature->name}}</strong></label>
                    </div>
                @endforeach
            </div>

        </div>

        <hr>

        <div class="form-group text-right">
            <a href="{{route('plans.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success" type="submit"> Sincronizar </button>
        </div>
    </form>

</x-app-layout>