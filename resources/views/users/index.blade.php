<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>
        
    <br>

    <div class="card">
     
        <div class="card-body">
            <p class="card-text">
                <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($users as $key => $user)
                            <tr class="text-center">
                                <th scope="row">{{ $key +1}}</th>                               
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>   
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Editar
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
