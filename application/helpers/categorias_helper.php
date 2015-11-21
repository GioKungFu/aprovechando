<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

if(!function_exists('menu_principal'))
{

    function menu_principal() 
    {

        $ci =& get_instance();

        $ci->load->model('categorias');

        $categorias = $ci -> categorias -> listarCategoriasPorPadre(0);

        $cadena = '<select name="cat" class="cat-search .input_cat"><option value="0"> Categorías</option>';
        foreach ($categorias as $categoria) 
        {
            $cadena.='<option value="'.$categoria['id_categoria'].'">'.$categoria['nombre'].'</option>';
        }
        $cadena.= '</select>';

        return $cadena;

    }
    
}

if(!function_exists('miga'))
{

    function miga($id_categoria) 
    {
        if ($id_categoria != 0) 
        {
            $ci =& get_instance();

            $ci->load->model('categorias');

            $categoria = $ci -> categorias -> obtenerCategoria($id_categoria);

            if ($categoria['padre'] != 0) 
            {
                miga($categoria['padre']);
                
            }
            
            echo '<li class="category10">
                            <a href="'.base_url().'main/productos" title="'.$categoria['nombre'].'">'.$categoria['nombre'].'</a>
                            <span class="separator">/ </span>
                  </li>'; 

        }

    }
    
}


if(!function_exists('menu_superior'))
{

    function menu_superior( $padre , $nivel ) 
    {

        $ci =& get_instance();

        $ci->load->model('categorias');

        $categorias = $ci -> categorias -> listarCategoriasPorPadre($padre);

        if(count($categorias)) 
        {
            if($nivel == 0)
            {
                echo '<ul class="hnav "><li class="menu-item-link menu-item-depth-0"><a href="'.base_url().'"><span>Inicio</span></a></li>';
            }
            else if($nivel == 1)
            {
                echo '<ul class="menu-container"><li><div><ul class="em-catalog-navigation ">';
            }
            else
            {
                echo '<ul>';
            }
            foreach ($categorias as $categoria) 
            {
                if($nivel == 0)
                {
                    echo '<li class="menu-item-link menu-item-depth-0"><a href="'.base_url().'main/productos"><span>'.$categoria['nombre'].'</span></a>';
                }
                else
                {
                    echo '<li><a href="'.base_url().'main/productos"><span>'.$categoria['nombre'].'</span></a>';
                }
                $nivel;
                menu_superior($categoria['id_categoria'], $nivel + 1);
                echo '</li>';


            }
            if($nivel == 1)
            {
                echo '</ul></div></li></ul>';
            }
            else
            {
                echo '</ul>';
            }
 
        }
 
    }
    
}



 
/* 
if(!function_exists('get_users'))
{
    function get_users()
    {
        //asignamos a $ci el super objeto de codeigniter
        //$ci será como $this
        $ci =& get_instance();
        $query = $ci->db->get('usuarios');
        return $query->result();
 
    }
}
*/
//end application/helpers/ayuda_helper.php