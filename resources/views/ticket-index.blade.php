<x-app-layout>

    <div class="card">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tickets') }}
            </h2>
        </x-slot>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-12 mt-4 text-right">
                    <a href="{{route('tickets.create')}}" class="btn btn-success" title="Criar ticket"> <i class="fas fa-fw fa-plus"></i> Criar Ticket</a>
                </div>
            </div>
            <p class="card-text">
                <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Responsável</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">1</th>                               
                            <td> Teste </td>
                            <td> 
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Dolor ipsa alias sequi rerum, impedit magni doloribus quidem 
                                quia aut repellat iusto dolore numquam perferendis voluptates 
                                veritatis tenetur recusandae, similique cupiditate.
                            </td>   
                            <td>
                                Bruno
                            </td>                             
                        </tr>
                     
                    </tbody>
                </table>
            </p>
        </div>
    </div>

</x-app-layout>