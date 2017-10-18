<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo', '=','sobre')->count();

        if($existe){
            $paginaSobre = Pagina::where('tipo', '=','sobre')->first();
            DB::table('paginas')->insert([
                'titulo' => '$paginaSobre->titulo',
                'descricao' => '$paginaSobre->descricao',
                'imagem' => '$paginaSobre->imagem',
                'texto' => '$paginaSobre->texto',
                'mapa' => '$paginaSobre->mapa',
                'tipo' => '$paginaSobre->tipo'
            ]);
        }else {
            DB::table('paginas')->insert([
                'titulo' => 'Título da empresa',
                'descricao' => 'Descrição breve sobre a empresa',
                'imagem' => 'img/modelo_img_home.jpg',
                'texto' => 'Texto sobre a Empresa',
                'mapa' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.8502587699236!2d-51.9176436849397!3d-23.42977576263137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc40a19a82277b719!2sInterativa+Sistemas!5e0!3m2!1spt-BR!2sbr!4v1506608729394" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
                'tipo' => 'sobre'
            ]);
            echo "Pagina Sobre Criada com sucesso\n";
        }

        $existe = Pagina::where('tipo', '=','contato')->count();

        if($existe){
            $paginaContato = Pagina::where('tipo', '=','contato')->first();
            DB::table('paginas')->insert([
                'titulo' => '$paginaContato->titulo',
                'descricao' => '$paginaContato->descricao',
                'imagem' => '$paginaContato->imagem',
                'email' => '$paginaContato->email',
                'tipo' => '$paginaContato->tipo'
            ]);
        }else{
            DB::table('paginas')->insert([
                'titulo' => 'Entre em contato',
                'descricao' => 'Preencha o formulário',
                'imagem' =>'img/modelo_img_home.jpg',
                'email' => 'desenvolvimento3@interativasistemas.com',
                'tipo' =>'contato',
            ]);
            echo "Pagina Contato Criada com sucesso";
        }
    }
}
