<strong> Dados pessoais </strong>
<small class="form-text text-muted">Mantenha os dados atualizados.</small>

<div class="row form-group mt-3">
    <div class="col-md-8">
        <label>Nome completo: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if(isset($user->name)) {{ $user->name }} @endif" required>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">        
        <input type="hidden" class="form-control @error('cpf') is-invalid @enderror" name="cpf" id="cpf" value="@if(isset($user->cpf)) {{ $user->cpf }} @endif" required>
        @error('cpf')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-md-8">
        <label>E-mail: <span class="text-danger">*</span> </label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(isset($user->email)) {{ $user->email }} @endif" required>
        @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Fone: <small>(Preferencialmente WhatsApp)</small> <span class="text-danger">*</span> </label> 
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="@if(isset($user->phone)) {{ $user->phone }} @endif" required>
        @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

</div>