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
        <input type="text" class="form-control @error('representative_name') is-invalid @enderror" name="representativeArray[name]" value="{{ old('representativeArray[name]') }}" required>
        @error('representative name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Setor: <span class="text-danger">*</span> </label>
        <select name="representativeArray[sector_id]" class="form-control  @error('sector_id') is-invalid @enderror" required>
            <option value="">-- selecione --</option>
            @foreach($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>
        @error('sector_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-md-8">
        <label>E-mail: <span class="text-danger">*</span> </label>
        <input type="email" class="form-control @error('representative_email') is-invalid @enderror" name="representativeArray[email]" value="{{ old('representativeArray[email]') }}" required>
        @error('representative_email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Fone: <small>(Preferencialmente WhatsApp)</small> <span class="text-danger">*</span> </label> 
        <input type="text" class="form-control @error('representative_fone') is-invalid @enderror" name="representativeArray[phone]" id="representative_fone" value="{{ old('representativeArray[phone]') }}" required>
        @error('representative_fone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
</div>