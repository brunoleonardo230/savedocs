<strong> Dados pessoais </strong>
<small class="form-text text-muted">Mantenha os dados atualizados.</small>

<div class="row form-group mt-3">
    <div class="col-md-8">
        <label>Nome completo: <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Empresa:</label>
        <select name="company" class="form-control">
            <option value=""> -- Selecione -- </option>
            @foreach($companies as $company)
                <option value="{{$company->id}}" @if(old('company') == $company->id) selected @endif )>{{$company->fantasy_name}}</option>
            @endforeach
        </select>

        <!-- <label>CPF: </label> -->
        <input type="hidden" class="form-control @error('cpf') is-invalid @enderror" name="cpf" id="cpf" value="{{ old('cpf') }}">
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
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>Fone: <small>(Preferencialmente WhatsApp)</small> <span class="text-danger">*</span> </label> 
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" required>
        @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

</div>