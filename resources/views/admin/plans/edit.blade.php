<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualiza Plano') }}
        </h2>
    </x-slot>

    <hr>
   
    <form action="{{route('plans.update', $plan->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="row form-group">
            <div class="col-md-6">
                <label>Nome plano: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ex.: Plano 1 mensal" value="{{$plan->name}}" required>
        
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div> 
            <div class="col-md-6">
                <label>Token plano: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('stripe_id') is-invalid @enderror" name="stripe_id" placeholder="Ex.: price_1LXZ7TAeOcvnEld9G1XxQldp" value="{{$plan->stripe_id}}" required>
        
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <h2>Preço: R$ {{$plan->price}}</h2>
                </div>
        </div>
        <div class="row form-group">     
            <div class="col-md-3">
                <label>Atendimento Remoto:</label>
                <input type="text" class="form-control @error('ticket_remote') is-invalid @enderror" name="ticket_remote" placeholder="0" value="{{$plan->ticket_remote}}">
            
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label>Atendimento Presencial:</label>
                <input type="text" class="form-control @error('ticket_in_person') is-invalid @enderror" name="ticket_in_person" placeholder="0" value="{{$plan->ticket_in_person}}">
            
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>  
        </div>    
     
        <div class="form-group text-right">
            <a href="{{route('plans.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Atualizar </button>
        </div>

        <hr>
    </form>


</x-app-layout>