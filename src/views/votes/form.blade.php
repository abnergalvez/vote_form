<form action="#" method="post">

    <div class="mb-2 row">
        <label for="fullname" class="col-sm-3 col-form-label">Nombre y Apellido </label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="fullname" id="fullname" value="" required>
            <div class="feedback"></div>
        </div>
    </div>

    <div class="mb-2 row">
        <label for="alias" class="col-sm-3 col-form-label">Alias (Opcional)</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="alias" id="alias">
            <div class="feedback"></div>
        </div>
    </div>

    <div class="mb-2 row">
        <label for="rut" class="col-sm-3 col-form-label">RUT</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="rut" id="rut" placeholder="formato 11222333-4" required>
            <div class="feedback"></div>
        </div>
        
    </div>

    <div class="mb-2 row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" required>
            <div class="feedback"></div>
        </div>
    </div>

    <div class="mb-2 row">
        <label for="region" class="col-sm-3 col-form-label">Region</label>
        <div class="col-sm-9">
            <select name="region" class="form-select" id="region" required>
            <option value="">Seleccione Region</option>
                @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->label }}</option>
                @endforeach
            </select>
            <div class="feedback"></div>
        </div>
    </div>

    <div class="mb-2 row">
        <label for="commune" class="col-sm-3 col-form-label">Comuna</label>
        <div class="col-sm-9">
            <select name="commune" class="form-select" id="commune" required>
                <option value="">Seleccione Comuna</option>
            </select>
            <div class="feedback"></div>
        </div>
    </div>

    <div class="mb-2 row">
        <label for="candidate" class="col-sm-3 col-form-label">Candidato</label>
        <div class="col-sm-9">
            <select name="candidate" class="form-select" id="candidate" required>
                <option value="">Seleccione Candidato</option>
                @foreach($candidatesVotes as $candidate)
                <option value="{{ $candidate['id'] }}">{{ $candidate['name'] }}</option>
                @endforeach
            </select>
            <div class="feedback"></div>
        </div>
    </div>

    <div class="mb-2 row">
        <label for="find_out" class="col-sm-3 col-form-label">Como se entero de nosotros?</label>
        <div class="col-sm-9">
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="find_out[]" type="checkbox"  value="web">
                <label class="form-check-label" >Web</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="find_out[]" type="checkbox"  value="tv">
                <label class="form-check-label" >TV</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="find_out[]" type="checkbox"  value="rrss">
                <label class="form-check-label" >Redes Sociales</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="find_out[]" type="checkbox"  value="friend">
                <label class="form-check-label">Amigo</label>
            </div>
            <div class="feedback-checkbox"></div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg" type="button" onclick="submitForm();">Votar</button><br><br>
</form>