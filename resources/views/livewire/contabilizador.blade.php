<div class="container">
    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Sociedad</label>
            <input class="form-control" wire:model="sociedad" type="text" disabled>

        </div>
        <div class="col">
            <label for="" class="form-label">Tipo.Doc</label>
            <input wire:model="tipodoc" class="form-control" type="text" disabled>
        </div>
        <div class="col">
            <label for="" class="form-label">Recibo x Serv.Pub</label>
            <input wire:model="reciboservpub" class="form-control" type="text">
            @error('reciboservpub')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Número</label>
            <input wire:model="numero" class="form-control" type="text">
            @error('numero')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Clase documento</label>
            <input wire:model="clasedocumento" class="form-control" type="text" disabled>
        </div>
        <div class="col">
            <label for="" class="form-label">Cod.Proveedor</label>
            {{-- <input wire:model="codproveedor" class="form-control" type="text"> --}}
            <select wire:model.defer="codproveedor" class="form-control">
                <option value="" selected></option>
                @foreach ($proveedores as $proveedor)
                <option value={{$proveedor->codigo}}>{{$proveedor->codigo}}-{{$proveedor->nombre}}</option>
                @endforeach
            </select>
            @error('codproveedor')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            {{-- //201219 --}}
            @if ($msjcodproveedor)
            <div class="text-primary">{{ $msjcodproveedor->nombre }}</div>
            @endif
            @if ($msjcodproveedorfail)
            <div class="text-primary">{{ $msjcodproveedorfail }}</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Fecha documento</label>
            <input wire:model="fechadocumento" class="form-control" type="text">
            @error('fechadocumento')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Suministro</label>
            <input wire:model="suministro" class="form-control" type="text">
            @error('suministro')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            {{-- //341069 --}}
            @if ($msjsuministro)
            <div class="text-primary">{{ $msjsuministro->direccion }}</div>
            @endif
            @if ($msjsuministrofail)
            <div class="text-primary">{{ $msjsuministrofail }}</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Fecha contab.</label>
            <input wire:model="fechacontab" class="form-control" type="text">
            @error('fechacontab')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Centro coste</label>
            <input wire:model="centrocoste" class="form-control" type="text">
            @error('centrocoste')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Periodo.</label>
            <input wire:model="periodo" class="form-control" type="text">
            @error('periodo')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Txt.cab.doc</label>
            <input wire:model="txtcabdoc" class="form-control" type="text">
            @error('txtcabdoc')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Moneda.</label>
            <input wire:model="moneda" class="form-control" type="text" disabled>
        </div>
        <div class="col">
            <label for="" class="form-label">Importe</label>
            <input wire:model="importe" class="form-control" type="text">
            @error('importe')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="" class="form-label">Cond.pago.</label>
            <input wire:model="condpago" class="form-control" type="text">
            @error('condpago')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col d-flex justify-content-around mt-4">
            <label for="" class="form-label">Calcular IVA</label>
            <input class="form-check-input" type="checkbox">
            @error('calciva')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Blq.pago.</label>
            {{-- <input wire:model="blqpago" class="form-control" type="text"> --}}
            <select wire:model="blqpago" class="form-control">
                <option value="" selected></option>
                @foreach ($blqpagos as $bqlpag)
                <option value={{$bqlpag->codigo}}>{{$bqlpag->codigo}}-{{$bqlpag->nombre}}</option>
                @endforeach
            </select>
            @error('blqpago')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="" class="form-label">Via pago</label>
            {{-- <input wire:model="viapago" class="form-control" type="text"> --}}
            <select wire:model="viapago" class="form-control">
                <option value="" selected></option>
                @foreach ($viapagos as $viapag)
                <option value={{$viapag->codigo}}>{{$viapag->codigo}}-{{$viapag->nombre}}</option>
                @endforeach
            </select>
            @error('viapago')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        Texto/asign.
        <div class="col">
            <input wire:model="textasign" class="form-control" type="text">
            @error('textasign')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        /
        <div class="col">
            <input wire:model="fechafinal" wire:keydown.enter='presionoenter' class="form-control" type="text">
            @error('fechafinal')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    @if ($mostrarmenusecundario == true)
    <table class="table">
        <thead>
            <th scope="col">Cuenta</th>
            <th scope="col">Importe</th>
            <th scope="col">II</th>
            <th scope="col">Div</th>
            <th scope="col">CeCo</th>
            <th scope="col">Orden</th>
            <th scope="col">Soci</th>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td><input wire:model="cuenta" type="text"></td>
                <td><input wire:model="importea" type="text"></td>
                <td><input wire:model="II" type="text"></td>
                <td><input wire:model="div" type="text"></td>
                <td><input wire:model="ceco" type="text"></td>
                <td><input wire:model="orden" type="text"></td>
                <td><input wire:model="soci" type="text"></td>
            </tr>
            <tr>
                <td><input wire:model="cuentab" type="text"></td>
                <td><input wire:model="importeb" type="text"></td>
                <td><input wire:model="IIb" type="text"></td>
                <td><input wire:model="divb" type="text"></td>
                <td><input wire:model="cecob" type="text"></td>
                <td><input wire:model="ordenb" type="text"></td>
                <td><input wire:model="socib" type="text"></td>
            </tr>
        </tbody>
    </table>

    <button type="button" wire:click='simular' class="btn btn-primary">SIMULAR</button>
    @endif

    @if ($mostrarsimulacion)
    <table class="table">
        <thead>
            <td scope="col">DIV.</td>
            <td scope="col">Cuenta</td>
            <td scope="col">S/. Importe</td>
            <td scope="col">Imp-IVA</td>
        </thead>

        <tbody class="table-group-divider">
            <tr>
                <td>{{$div}}</td>
                <td>0000201219 Luz del Sur</td>
                <td>{{$importe}}</td>
                <td>**</td>
            </tr>
            <tr></tr>
                <td>{{$div}}</td>
                <td>43611111001 Energía Electrica</td>
                <td>{{ round(($importea/1.18),2) }}</td>
                <td>C1</td>
            </tr>
            <tr>
                <td>{{$div}}</td>
                <td>43611111001 Energía Electrica</td>
                <td>{{round(($importeb),2)}}</td>
                <td>C0</td>
            </tr>
            <tr>
                <td>{{$div}}</td>
                <td>40111111001 IGV # Cuenta ER-90P</td>
                <td>{{ round( (($importea/1.18)*18/100),2 ) }}</td>
                <td>C1</td>
            </tr>
        </tbody>
    </table>
    @endif
</div>