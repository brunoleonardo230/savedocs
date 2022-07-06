<strong> Dados jurídicos </strong>
<small class="form-text text-muted">Mantenha os dados atualizados.</small>

<div class="row form-group mt-3">
    <div class="col-md-8">
        <label>Nome fantasia: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('fantasy_name') is-invalid @enderror" name="fantasy_name" value="{{ old('fantasy_name') }}" required>
        @error('fantasy_name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>CNPJ: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" required>
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
        <input type="text" class="form-control @error('representative_name') is-invalid @enderror" name="representativeArray[representative_name]" value="{{ old('representativeArray[representative_name]') }}" required>
        @error('representative name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>CPF: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('representative_cpf') is-invalid @enderror" name="representativeArray[representative_cpf]" id="representative_cpf" value="{{ old('representativeArray[representative_cpf]') }}" required>
        @error('representative_cpf')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-md-8">
        <label>E-mail: <span class="text-danger">*</span> </label>
        <input type="email" class="form-control @error('representative_email') is-invalid @enderror" name="representativeArray[representative_email]" value="{{ old('representativeArray[representative_email]') }}" required>
        @error('representative_email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Fone: <small>(Preferencialmente WhatsApp)</small> <span class="text-danger">*</span> </label> 
        <input type="text" class="form-control @error('representative_fone') is-invalid @enderror" name="representativeArray[representative_fone]" id="representative_fone" value="{{ old('representativeArray[representative_fone]') }}" required>
        @error('representative_fone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>