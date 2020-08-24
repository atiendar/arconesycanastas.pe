<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user1 = App\User::create([
            'acceso'                => '1',
            'registros_tab_acces'   => 'on',
            'img_us_rut'            => env('PREFIX'),
            'img_us'                => 'perfil/2020/perfil-1582071257.png',
            'nom'      			        => 'Aaron Josue',
            'apell'     		        => 'Sánchez Mendoza',
            'email_registro'  	    => 'desarrolloweb.ewmx@gmail.com',
            'email'  			          => 'desarrolloweb.ewmx@gmail.com',
            'email_secund'  	      => 'diseno2.ewmx@gmail.com',
            'lad_fij'  			        => '55',
            'tel_fij'  			        => '71596103',
            'ext'  				          => '1209',
            'lad_mov'  			            => '55',
            'tel_mov'  			            => '17552250',
            'emp'  				              => 'CYA',
            'password'  		            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token'  	        => 'bzXvIS0JrfdMth7eDBgxjE6lSQ66ESHSEUJSnqldoxhBUPaoeQFfrw3zrVg1',
            'col_barr_de_naveg'         => 'navbar-dark navbar-purple',
            'col_barr_lat_oscu_o_clar'  => 'sidebar-light-navy',
            'col_logot'                 => 'navbar-pink',
            'asignado_us'  	            => 'desarrolloweb.ewmx@gmail.com',
            'created_at_us'  	          => 'desarrolloweb.ewmx@gmail.com',
        ]);
        $user1->assignRole('desarrollador');
        $user5 = App\User::create([
            'acceso'                => '1',
            'registros_tab_acces'   => 'on',
            'nom'      			    => 'Luis',
            'apell'     		    => 'Cruz',
            'email_registro'  	    => 'b.desarrollo4@gmail.com',
            'email'  			    => 'b.desarrollo4@gmail.com',
            'lad_mov'  			    => '55',
            'tel_mov'  			    => '00000000',
            'emp'  				    => 'GM',
            'password'  		    => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'  	    => Str::random(10),
            'col_barr_de_naveg'     => 'navbar-dark',
            'asignado_us'  	        => 'desarrolloweb.ewmx@gmail.com',
            'created_at_us'  	    => 'desarrolloweb.ewmx@gmail.com',
        ]);
        $user5->assignRole('desarrollador');
        factory(User::class, 1000)->create();

        // Asigna roles a los usuarios
        $roles_usuario = Role::where('name', '!=', config('app.rol_cliente'))->get();
        $hasta_roles_usuario = count($roles_usuario) - 1;
        $usuarios = User::where('acceso', '1')->get();
        $hasta_usuarios = count($usuarios) - 1;
        $contador3 = 0;

        for($contador2 = 0; $contador2 <= $hasta_usuarios; $contador2++) {
            $rol_usuario = $roles_usuario[$contador3]->name;
            $contador3 += 1;
            $usuario = $usuarios[$contador2];
            $usuario->assignRole($rol_usuario);
            if($contador3 == $hasta_roles_usuario) { $contador3 = 0; }
        }

        // Asigna roles a los clientes
        $roles_cliente = array(config('app.rol_cliente'), config('app.rol_sin_acceso_al_sistema'));
        $hasta_roles_cliente = count($roles_cliente);
        $clientes = User::where('acceso', '2')->get();
        $hasta_clientes = count($clientes) - 1;
        $contador4 = 0;

        for($contador5 = 0; $contador5 <= $hasta_clientes; $contador5++) {
            $rol_cliente = $roles_cliente[$contador4];
            $contador4 += 1;
            $cliente = $clientes[$contador5];
            $cliente->assignRole($rol_cliente);
            if($contador4 == $hasta_roles_cliente) { $contador4 = 0; }
        }
    }
}
