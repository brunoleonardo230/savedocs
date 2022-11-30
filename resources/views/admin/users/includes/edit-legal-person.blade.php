<strong> Dados jurídicos </strong>
<small class="form-text text-muted">Mantenha os dados atualizados.</small>

<div class="row form-group mt-3">
    <div class="col-md-8">
        <label>Nome fantasia: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('fantasy_name') is-invalid @enderror" name="fantasy_name" value="@if(isset($user->fantasy_name)) {{ $user->fantasy_name }} @endif" required>
        @error('fantasy_name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>CNPJ: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" id="cnpj" value="@if(isset($user->cnpj)) {{ $user->cnpj }} @endif" required>
        @error('cnpj')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>

<hr class="mt-4">

<strong> Dados representante </strong>

<div class="row form-group mt-3">
    <div class="col-md-8">
        <label>Nome completo: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('representative_name') is-invalid @enderror" name="representativeArray[name]" value="@if(isset($user->representative)) {{ $user->representative->name }} @endif" required>
        @error('representative name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <!-- <div class="col-md-4">
        <label>CPF: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('representative_cpf') is-invalid @enderror" name="representativeArray[cpf]" id="representative_cpf" value="@if(isset($user->representative)) {{ $user->representative->cpf }} @endif" required>
        @error('representative_cpf')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div> -->
</div>

<div class="row form-group">
    <div class="col-md-8">
        <label>E-mail: <span class="text-danger">*</span> </label>
        <input type="email" class="form-control @error('representative_email') is-invalid @enderror" name="representativeArray[email]" value="@if(isset($user->representative)) {{ $user->representative->email }} @endif" required>
        @error('representative_email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Fone: <small>(Preferencialmente WhatsApp)</small> <span class="text-danger">*</span> </label> 
        <input type="text" class="form-control @error('representative_fone') is-invalid @enderror" name="representativeArray[phone]" id="representative_fone" value="@if(isset($user->representative)) {{ $user->representative->phone }} @endif" required>
        @error('representative_fone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>