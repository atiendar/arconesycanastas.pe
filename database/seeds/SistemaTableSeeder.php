<?php
use Illuminate\Database\Seeder;

class SistemaTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        App\Models\Sistema::create([
            'id'                    => 1,
        	'log_neg_rut'		    => 'public/sistema/',
        	'log_neg'			    => 'logo-negro-1582134710.png',
        	'log_blan_rut'		    => 'public/sistema/',
        	'log_blan'			    => 'logo-blanco-1582580735.png',
            'carrus_login_rut'      => 'public/sistema/',
            'carrus_login'          => 'carrusel-login-1582134710.png',
            'carrus_reque_rut'      => 'public/sistema/',
            'carrus_reque'          => 'carrusel-request-1582134710.png',
            'carrus_rese_rut'       => 'public/sistema/',
            'carrus_rese'           => 'carrusel-reset-1582134710.png',
            'defau_img_perf_rut'    => 'public/sistema/',
            'defau_img_perf'        => 'default-perfil-1582134710.png',
            'img_construc_rut'      => 'public/sistema/',
            'img_construc'          => 'en-construccion-1582134710.png',
            'error_rut'             => 'public/sistema/',
            'error'                 => 'error-1582134710.png',
            'emp'				    => 'Canastas Y Arcones S.A de C.V',
            'emp_abrev'			    => 'Canastas Y Arcones',
            'year_de_ini'           => '2016-01-01',
            'lad_fij'			    => '55',
        	'tel_fij'			    => '71596103',
            'ext'				    => '1200',
            'direc_uno'             => 'Blvrd Manuel Ávila Camacho 80, Int 204, El Parque, 53398 Naucalpan de Juárez, MEX',
            'corr_vent'			    => 'contacto@canastasyarcones.mx',
            'pag'				    => 'https://canastasyarcones.mx',
            'red_fbk'               => 'https://www.facebook.com/canastasyarconesmx/',
            'red_tw'                => 'https://twitter.com/arconesmx/',
            'red_ins'               => 'https://www.instagram.com/arconesmx/',
            'red_link'              => 'https://www.linkedin.com/company/canastas-y-arcones/',
            'red_youtube'           => 'https://www.youtube.com/watch?v=cOxLGYPegVg',
            'ser_cotizaciones'      => 'COT-CYA-',
            'ser_pedidos'           => 'PED-CYA-',
            'plant_usu_bien'        => 1,
            'plant_cli_bien'        => 2,
            'plant_per_camb_pass'   => 3,
            'plant_sis_rest_pass'   => 4,
            'plant_cot_term_cond'   => 5,
            'plant_vent_reg_ped'    => 6,
            'plant_vent_ped_can'    => 7,
            'plant_pag_reg_pag'     => 8,
            'plant_pag_pag_rech'    => 9,
            'plant_fac_generada'    => 10,
            'plant_fac_cancelado'   => 11,
        	'created_at_sis'	    => 'desarrolloweb.ewmx@gmail.com',
        ]);
    }
}
