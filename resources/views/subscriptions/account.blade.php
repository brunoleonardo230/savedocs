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
                            {{-- <div class="card-header">
                                <p> <small> Assinante:</small> <strong>{{ $user->plan()->name }}</strong> </p>
                            </div> --}}
                            <div class="card-body">
                                <h5 class="card-title"><p> <small> Assinante:</small> <strong>{{ $user->plan()->name }}</strong> </p></h5>
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
                                        Plano Cancelada
                                    @endif
                                </p>
            
                            </div>
                        </div>
                        
                    @else
                        <div class="alert alert-danger text-center" role="alert">
                            Você não possui plano
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <br>

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

</x-app-layout>
