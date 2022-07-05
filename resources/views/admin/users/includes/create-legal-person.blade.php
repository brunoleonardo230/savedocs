<strong> Dados jurídicos </strong>
<small class="form-text text-muted">Mantenha os dados atualizados.</small>

<div class="row form-group">
    <div class="col-md-8">
        <label>Nome fantasia: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('fantasy_name') is-invalid @enderror" name="fantasy name" value="{{ old('fantasy name') }}" required>
        @error('fantasy name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>CNPJ: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required>
        @error('cnpj')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>

<strong> Dados representante </strong>

<div class="row form-group">
    <div class="col-md-8">
        <label>Nome completo: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('representative_name') is-invalid @enderror" name="representative_name" value="{{ old('representative_name') }}" required>
        @error('representative name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>CPF: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('representative_cpf') is-invalid @enderror" name="representative_cpf" value="{{ old('representative_cpf') }}" required>
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
        <input type="email" class="form-control @error('representative_email') is-invalid @enderror" name="representative_email" value="{{ old('representative_email') }}" required>
        @error('representative_email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Fone: <span class="text-danger">*</span> </label> 
        <input type="text" class="form-control @error('representative_fone') is-invalid @enderror" name="representative_fone" value="{{ old('representative_fone') }}" required>
        @error('representative_fone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>