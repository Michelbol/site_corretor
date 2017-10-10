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

        }else{
            $paginaSobre = new Pagina();
        }

        $paginaSobre->titulo = "Título da empresa";
        $paginaSobre->descricao = "Descrição breve sobre a empresa";
        $paginaSobre->texto = "Texto sobre a Empresa";
        $paginaSobre->imagem = "img/modelo_img_home.jpg";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.8502587699236!2d-51.9176436849397!3d-23.42977576263137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc40a19a82277b719!2sInterativa+Sistemas!5e0!3m2!1spt-BR!2sbr!4v1506608729394" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();
        echo "Pagina Sobre Criada com sucesso\n";

        $existe = Pagina::where('tipo', '=','contato')->count();

        if($existe){
            $paginaContato = Pagina::where('tipo', '=','contato')->first();

        }else{
            $paginaContato = new Pagina();
        }

        $paginaContato->titulo = "Entre em contato";
        $paginaContato->descricao = "Preencha o formulário";
        $paginaContato->texto = "Contato";
        $paginaContato->imagem = "img/modelo_img_home.jpg";
        $paginaContato->email = "desenvolvimento3@interativasistemas.com";
        $paginaContato->tipo = "contato";
        $paginaContato->save();
        echo "Pagina Contato Criada com sucesso";
    }
}
