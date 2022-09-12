<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MEU PLANO') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($subscription)
                        <div class="card">                            
                            <div class="card-body">
                                <h5 class="card-title">
                                    <p>
                                        <strong>{{ $user->plan()->name }}</strong>
                                        @if($user->access_status ='active' )
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <i class="fas fa-check"></i> Ativo
                                            </div>                                    
                                        @else
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                <i class="fas fa-times"></i> Cancelado
                                            </div>
                                        @endif
                                    </p>
                                </h5>
                                
                                <p> <strong> Data Inicio:</strong> <small>{{ $user->access_begin }} </small></p>
                                <p> <strong> Data Renovação:</strong> <small>{{ $user->access_renovation }} </small></p>
                                <p> Caso não queira renovar a sua assinatura e não ter mais acesso a nossos seviços, basta clicar em "Cancelar Assinatura".</p>

                                <p class="card-text">
                                    @if ($subscription->cancelled() && $subscription->onGracePeriod())
                                        <a href="{{ route('subscriptions.resume') }}" class="btn btn-outline-success">
                                            Reativar Plano
                                        </a>
            
                                        <div class="alert alert-warning" role="alert">
                                            Seu acesso vai até: {{ $user->access_end }}
                                        </div>
                                    @elseif (!$subscription->cancelled())
                                        <a href="{{ route('subscriptions.cancel') }}" class="btn btn-outline-danger">
                                            Cancelar Plano
                                        </a>
                                    @endif
            
                                    @if ($subscription->ended())
                                        Plano Cancelado
                                    @endif
                                </p>
            
                            </div>
                        </div>

                        <div class="card">
     
                            <div class="card-body">
                                <p class="card-text">
                                    <table class="table table-striped">
                                        <thead class="text-center">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">DATA</th>
                                            <th scope="col">PREÇO</th>
                                            <th scope="col">DOWNLOAD</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $key => $invoice)
                                                <tr class="text-center">
                                                    <th scope="row">{{ $key +1}}</th>
                                                    <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                                    <td>{{ $invoice->total() }}</td>
                                                    <td>
                                                        <a href="{{ route('subscriptions.invoice.download', $invoice->id) }}" class="btn btn-secondary">
                                                            Baixar
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        
                                        </tbody>
                                    </table>
                                </p>
                            </div>
                        </div>
                        
                    @else
                        @if($user->type_user_id == 1)
                            <div class="alert alert-danger text-center" role="alert">
                                Você não possui plano
                            </div>
                        
                            <!-- <h1>Escolha seu plano</h1> -->
                            <div class="row">
                                @foreach ($plans as $plan)
                                    @if($plan->id <= 3 )
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <h3 class="text-uppercase">
                                                                {{ $plan->name }}
                                                            </h3>
                                                            <h2 class="text-primary text-uppercase">R$ {{ $plan->price_br }}</h2>                                                    
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('choice.plan', $plan->url) }}" class="btn btn-success">Assinar</a>
                                                        </div>
                                                    
                                                        @foreach ($plan->features as $feature)
                                                            <p>* {{ $feature->name }}</p>                                                    
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>   
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                Você não possui plano, entre em contato conosco ( contato@savedocs.com.br )
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <br>

    

</x-app-layout>
