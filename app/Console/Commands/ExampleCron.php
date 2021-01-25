<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Relatorio;
use App\Models\Unidade;
use Carbon\Carbon;


class ExampleCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $unidades = Unidade::all();
         
         $arr = [];

        foreach($unidades as $unidade) {
            $a = $unidade->id;
            array_push($arr, $a);
        }
        
        // dd($arr);

        foreach($arr as $key => $id){
            $a = Carbon::now()->locale('pt_BR')->format('d-m-Y');
            // DB::table('relatorios')->insert(['unidade_id' => $id]);
            DB::table('relatorios')->insert(['unidade_id' => $id,'data' => $a]);
        }
    }
}
