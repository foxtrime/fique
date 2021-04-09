  
<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();
// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login');

Route::group(['middleware'=>['auth']], function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
    /*==================================LOGOUT=================================*/
    Route::post('/logout',function(){
        Auth::logout();
        return redirect()->route('login');
    });
    Route::get('/logout',function(){
        Auth::logout();
        return redirect()->route('login');
    });
    /*============================================================================*/
    
    /*==================================REGISTRAR=================================*/
    Route::get('/register', 'AuthController@create');
    Route::post('register', 'AuthController@store');
    /*============================================================================*/
    
    //========================================================================================
    // 										CHAMADO_TI
    //========================================================================================
    //Route::post('relatorio/enviachamadoti', 'RelatorioController@envia');
    Route::get('moduloti/enviachamadoti', 'ModuloTiController@envia');
    
    //========================================================================================
    // 										CHAMADO_INFRAESTRUTURA_PREDIAL
    //========================================================================================
    Route::get('moduloinfra/enviarchamadoinfra', 'ModuloInfraController@envia');



//===========================Password=======================================
    Route::get 	('/alterasenha',		'AuthController@AlteraSenha');
	Route::post	('/salvasenha',   		'AuthController@SalvarSenha');
//==========================================================================

//==============================RESOURCE====================================
    Route::resource('unidade',		    'UnidadeController');
    Route::resource('relatorio',		'RelatorioController');
    Route::resource('funcionario',      'FuncionarioController');
    Route::resource('usuario',          'UsuarioController');
    Route::resource('indicador',        'IndicadorController');
//==========================================================================

});
