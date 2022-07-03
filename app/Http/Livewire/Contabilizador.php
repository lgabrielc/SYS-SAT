<?php

namespace App\Http\Livewire;

use App\Models\bloqpago;
use App\Models\proveedor;
use App\Models\suministro;
use App\Models\viapago;
use Livewire\Component;
use Livewire\WithFileUploads;

class Contabilizador extends Component
{
    use WithFileUploads;

    public $sociedad = "SEDA", $tipodoc = "14", $reciboservpub, $numero;
    public $clasedocumento = "KU", $codproveedor, $fechadocumento, $suministro, $fechacontab, $centrocoste, $msjcodproveedor, $msjsuministro;
    public $orden, $cuenta, $ceco, $soci, $div, $II, $mostrarmenusecundario = false, $pruebaa, $txtcabdoc, $periodo, $message, $moneda = "S/.", $importe, $condpago, $blqpago, $viapago , $textasign, $fechafinal;
    public $cuentab, $importea, $importeb, $IIb, $divb, $cecob, $ordenb, $socib, $proveedores;
    public $calciva, $viapagos, $blqpagos, $msjcodproveedorfail, $msjsuministrofail, $mostrarsimulacion = false;
    protected $rules = [
        'codproveedor' => 'required',
        // 'content' => 'required|min:10|max:240',
        // 'image' => 'required|image|max:2048',
    ];
    public function mount()
    {
        $this->proveedores = proveedor::all();
        $this->viapagos = viapago::all();
        $this->blqpagos = bloqpago::all();
        $this->identificador = rand();
    }
    public function cancel()
    {
        $this->reset(['open', 'title', 'content', 'image']);
    }
    public function presionoenter()
    {
        $this->validate(
            [
                'codproveedor' => 'required',
                'suministro' => 'required',
                'reciboservpub' => 'required',
                'numero' => 'required',
                'fechadocumento' => 'required',
                'fechacontab' => 'required',
                'centrocoste' => 'required',
                'periodo' => 'required',
                'importe' => 'required',
                'condpago' => 'required',
                'textasign' => 'required',
                'fechafinal' => 'required',
                'blqpago' => 'required',
                'viapago' => 'required',
            ],
            [
                'codproveedor.required' => 'Este campo es obligatorio',
                'suministro.required' => 'Este campo es obligatorio',
                'reciboservpub.required' => 'Este campo es obligatorio',
                'numero.required' => 'Este campo es obligatorio',
                'fechadocumento.required' => 'Este campo es obligatorio',
                'fechacontab.required' => 'Este campo es obligatorio',
                'centrocoste.required' => 'Este campo es obligatorio',
                'periodo.required' => 'Este campo es obligatorio',
                'importe.required' => 'Este campo es obligatorio',
                'condpago.required' => 'Este campo es obligatorio',
                'textasign.required' => 'Este campo es obligatorio',
                'fechafinal.required' => 'Este campo es obligatorio',
                'blqpago.required' => 'Este campo es obligatorio',
                'viapago.required' => 'Este campo es obligatorio',
            ]
        );
        if ($this->codproveedor) {
            if ($consulta = proveedor::where('codigo', '=', $this->codproveedor)->first()) {
                $this->msjcodproveedor = $consulta;
                $this->reset('msjcodproveedorfail');
            } else {
                $this->msjcodproveedorfail = 'No valido';
                $this->reset('msjcodproveedor');
            }
        } else {
            $this->msjcodproveedorfail = 'No valido';
        }
        // $this->msjcodproveedor = "Luz Del Sur";
        if ($this->suministro) {
            if ($consulta = suministro::where('codigo', '=', $this->suministro)->first()) {
                $this->msjsuministro = $consulta;
                $this->reset('msjsuministrofail');
            } else {
                $this->msjsuministrofail = "No valido";
                $this->reset('msjsuministro');
            }
        } else {
            $this->msjsuministrofail = "No valido";
        }
        $this->importea=$this->importe;
        $rest = substr($this->textasign, 4, 7);
        $impa = $this->importe;
        $this->importea = $impa;
        $this->textasign = 'Suministro:' . $rest;
        $this->txtcabdoc = $this->textasign;
        $this->II = "C1";
        $this->cuenta = "6361111001";
        $this->div = "SEDA";
        $this->soci = "SEDA";
        $this->cuentab = "6361111001";
        $this->IIb = "C1";
        $this->divb = "SEDA";
        $this->socib = "SEDA";
        $this->mostrarmenusecundario = true;
    }
    public function simular()
    {


        $this->mostrarsimulacion = true;
    }
    public function render()
    {
        return view('livewire.contabilizador');
    }
}
