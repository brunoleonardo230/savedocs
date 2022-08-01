@php
  $user = auth()->user();
@endphp

<div class="modal fade" id="modal-data-update-for-access" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h3 class="modal-title text-white" id="exampleModalLabel"> Dados para acesso de {{ $user->name ? $user->name : $user->fantasy_name }} </h3>
      </div>
      <form action="{{route('accounts.access.update', $user->id)}}"  method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body">

          @if(session()->has('first-access'))
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Bem-vindo(a)!!</h4>
              <p> 
                Estamos muito felizes com seu primeiro acesso, sugerimos que você atualize sua senha para maior segurança, 
                mas caso prefira deixar isso para outro momento, clique no botão cancelar. 
              </p>
                
              <p> Você poderá atualizar seus dados de acesso a qualquer momento através da opção: <strong>"Minha conta" </strong> no canto superior direito.</p>
            </div>
          @endif

          <div class="form-group">
            <label for="user_login" class="col-form-label">Login:  <span class="text-danger">*</span> </label>
            <input type="text" class="form-control" id="user_login" name="user_login" value="{{$user->user_login}}" required>
            <small class="form-text text-muted">
              Você pode usar seu E-mail, CPF ou nome personalizado, ex: save.docs
            </small>
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Senha:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********">
            <small class="form-text text-muted">
              Caso você não informe nova senha, seu acesso continuará validado com a senha atual
            </small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <input type="submit" value="Atualizar" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>