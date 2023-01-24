<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Solicitação') }}
        </h2>
    </x-slot>

    <hr>

    <form action="{{route('tickets.store')}}"  method="post">
        @csrf
        @if($user->role_id == 3)
            <div class="row form-group">
                <div class="col-md-6">
                    <label>Nome do Cliente: <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" placeholder="Seu nome" value="{{$user->name}}" disabled >
                    <input type="hidden" id="assigned_to_user_id" name="assigned_to_user_id" value="{{$user->id}}" />
                    @error('author_name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>  
                <div class="col-md-6">
                    <label>E-mail para contato: <span class="text-danger">*</span> </label>
                    <input type="author_email" class="form-control @error('author_email') is-invalid @enderror" name="author_email" value="{{$user->email}}">
                    @error('author_email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        @else
            <div class="row form-group">
                <div class="col-md-6">
                    <label>Cliente: <span class="text-danger">*</span> </label>
                    <select name="assigned_to_user_id" class="form-control" required>
                        <option value=""> -- Selecione -- </option>
                        @foreach($users as $userAutor)                            
                            <option value="{{$userAutor->id}}">{{$userAutor->userCompany($userAutor->company)}} {{$userAutor->name}}</option>                                
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>E-mail para contato: <span class="text-danger">*</span> </label>
                    <input type="author_email" class="form-control @error('author_email') is-invalid @enderror" name="author_email" value="{{old('author_email')}}">
                    @error('author_email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        @endif

        <div class="row form-group">
            <div class="col-md-12">
                <label>Serviço: <span class="text-danger">*</span> </label>
                <select name="service_id" class="form-control" required>
                    <option value=""> -- Selecione -- </option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12">
                <label>Título: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Ex.: Sem acesso a internet" value="{{old('title')}}">
    
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>  
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label>Descrição do problema: <span class="text-danger">*</span> </label>
                <textarea id="content" name="content" class="form-control ">{{ old('content', isset($ticket) ? $ticket->content : '') }}</textarea>
            </div> 

        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label>Prioridade: <span class="text-danger">*</span> </label>
                <select name="priority_id" class="form-control" required>
                    <option value=""> -- Selecione -- </option>
                    @foreach($priorities as $priority)
                        <option value="{{$priority->id}}">{{$priority->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Tipo de Atendimento: <span class="text-danger">*</span> </label>
                <select name="type_id" class="form-control" required>                    
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group text-right">
            <a href="{{route('plans.index')}}" class="btn btn-danger"> Cancelar </a>
            <button class="btn btn-success"> Adicionar </button>
        </div>

        <hr>
    </form>

</x-app-layout>