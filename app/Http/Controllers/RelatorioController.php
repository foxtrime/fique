<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Relatorio;
use App\Models\Unidade;
use App\Models\Modulo_Ti;
use App\Models\Modulo_Atencao_Basica;
use App\Models\Modulo_Infraestrutura_Predial;
use App\Models\Modulo_Almoxarifado;
use App\Models\Modulo_Farmacia;
use App\Models\Modulo_Imunizacao;
use App\Models\Modulo_Odontologia;
use App\Models\Funcionario;

use App\Models\Ti_Pergunta;
use App\Models\Farmacia_Pergunta;
use App\Models\Imunizacao_Pergunta;
use App\Models\Odontologia_Pergunta;
use App\Models\Almoxarifado_Pergunta;
use App\Models\Atencao_Basica_Pergunta;
use App\Models\Infraestrutura_Pergunta;

use Carbon\Carbon;
use Auth;

class RelatorioController extends Controller
{
    public function index()
    {
        // Pega o Usuario Logado
        $user_logado = Auth::user();
                
        $relatorios = Relatorio::where('unidade_id','=', $user_logado->unidade_id)->with('unidade','modulo_ti')->get();

        // dd($relatorios[0]->modulo_ti);
        return view('relatorio.index', compact('relatorios'));

    }

    public function  create()
    {
        return view('relatorio.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        $relatorio = Relatorio::find($id);

        $funcionarios = Funcionario::all();

        // dd($funcionarios);

        // PERGUNTAS
        $perguntas = Ti_Pergunta::all();
        $perguntas_Infraestrutura = Infraestrutura_Pergunta::all();
        $perguntas_atencao_basica = Atencao_Basica_Pergunta::all();
        $perguntas_almoxarifado = Almoxarifado_Pergunta::all();
        $perguntas_farmacia = Farmacia_Pergunta::all();
        $perguntas_imunizacao = Imunizacao_Pergunta::all();
        $perguntas_odontologia = Odontologia_Pergunta::all();

        // MODULOS
        $modulo_ti = Modulo_Ti::where('relatorio_id','=',$relatorio->id)->get();
        $modulo_infraestrutura_predial = Modulo_infraestrutura_predial::where('relatorio_id_infra','=',$relatorio->id)->get();
        // $modulo_atencao_basica = Modulo_Atencao_Basica::where('relatorio_id_at_basi','=',$relatorio->id)->get();
        $modulo_almoxarifado = Modulo_Almoxarifado::where('relatorio_id_almo','=',$relatorio->id)->get();
        // $modulo_farmacia = Modulo_Farmacia::where('relatorio_id_far','=',$relatorio->id)->get();
        $modulo_imunizacao = Modulo_Imunizacao::where('relatorio_id_imuni','=',$relatorio->id)->get();
        // $modulo_odontologia = Modulo_Odontologia::where('relatorio_id_odonto','=',$relatorio->id)->get();

        //dd($modulo_almoxarifado);

        
        return view('relatorio.update', compact('relatorio','funcionarios','perguntas','modulo_ti','perguntas_Infraestrutura','perguntas_almoxarifado','perguntas_farmacia','perguntas_imunizacao','perguntas_odontologia','modulo_infraestrutura_predial','perguntas_atencao_basica','modulo_almoxarifado'));
    }

    public function update(Request $request, $id)
    {
        
        // ===================================================MODULO TI=========================================================
        $resultados_ti = array_map(null, $request['id'], $request['pergunta_id'],$request['n_chamado'],$request['obs']);

        foreach($resultados_ti as $resultado_ti) {
            if($resultado_ti[0] != null && $resultado_ti[2] != null && $resultado_ti[3] != null){
               //Fazer o Update do valor no Banco de dados

               $update = Modulo_Ti::find($resultado_ti[0]);
               $update->n_chamado = $resultado_ti[2];
               $update->obs = $resultado_ti[3];
                //$update->chamado_aberto = 1;   DEFAULT 1
               $update->save();
            
                //$a = $resultado_ti;
                //array_push($results,$a);
            }elseif($resultado_ti[0] == null && $resultado_ti[2] != null && $resultado_ti[3] != null){
                //Fazer o Create do Valor no Banco de dados
                $data = Carbon::now()->subDays(1)->locale('pt_BR')->format('d-m-Y');
               
                $insert = Modulo_Ti::create(['n_chamado' => $resultado_ti[2], 'obs' => $resultado_ti[3], 'relatorio_id' => $id,'pergunta_id'=> $resultado_ti[1],'data_chamado_aberto' => $data]);            
            }
        }
        // ===================================================MODULO TI=========================================================

        // ===================================================MODULO INFRAESTRUTURA=============================================
        $resultados_infra = array_map(null,$request['id_infra'],$request['pergunta_id_infra'],$request['n_chamado_infra'],$request['obs_infra']);
        // dd($resultados_infra);


        foreach($resultados_infra as $resultado_infra) {
            if ($resultado_infra[0] != null && $resultado_infra[2] != null && $resultado_infra[3] != null) {
                //UPDATE
                
                //dd($resultado_infra[0]);
                $update_infra = Modulo_Infraestrutura_Predial::find($resultado_infra[0]);
                $update_infra->n_chamado_infra = $resultado_infra[2];
                $update_infra->obs_infra = $resultado_infra[3];
               
                $update_infra->save();
               
            } elseif($resultado_infra[0] == null && $resultado_infra[2] != null && $resultado_infra[3] != null) {
                //CREATE

                $data_infra = Carbon::now()->subDays(1)->locale('pt_BR')->format('d-m-Y');

                $insert = Modulo_Infraestrutura_Predial::create(['n_chamado_infra' => $resultado_infra[2], 'obs_infra' => $resultado_infra[3], 'relatorio_id_infra' => $id,'pergunta_id_infra'=> $resultado_infra[1],'data_chamado_aberto_infra' => $data_infra]);

            }
        }
        // ===================================================MODULO INFRAESTRUTURA=============================================

        
        // ===================================================MODULO ALMOXARIFADO================================================
        $resultados_almo = array_map(null, $request['id_almo'],$request['pergunta_id_almo'],$request['material_almo'],$request['qtd_almo']);
        // dd($resultados_almo);

        foreach($resultados_almo as $resultado_almo) {
            if($resultado_almo[0] != null && $resultado_almo[2] != null && $resultado_almo[3] != null){
                //UPDATE
                $update_almo = Modulo_Almoxarifado::find($resultado_almo[0]);
                $update_almo->material_almo = $resultado_almo[2];
                $update_almo->qtd_almo = $resultado_almo[3];

                $update_almo->save();


            }elseif($resultado_almo[0] == null && $resultado_almo[2] != null && $resultado_almo[3] != null){
                //CREATE

              
                $insert = Modulo_Almoxarifado::create(['material_almo' => $resultado_almo[2], 'qtd_almo' => $resultado_almo[3], 'relatorio_id_almo' => $id, 'pergunta_id_almo' => $resultado_almo[1]]);
                
            }
        }
        // ===================================================MODULO ALMOXARIFADO================================================




        return redirect(url('/relatorio'));   
    }

}
