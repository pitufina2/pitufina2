<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
* @Route("/pizza")
*/
class PizzaController extends Controller
{
    /**
     * @Route("", name="pizza")
     */
    public function index()
    {
    	$vector = array("Margarita", "Carbonara", "Hawaiana");
        
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'minombre' => 'Jesus',
            'pizzas' => $vector
        ]);
    }
    /**
     * @Route("/nuevo", name="pizza_nuevo")
     */
    public function nuevoPizza()
    {
        $vectorciudades = array("Badajoz", "Caceres", "Mérida");
        
        return $this->render('pizza/nuevo.html.twig', [
            'ciudades' => $vectorciudades
        ]);
    }
    /**
     * @Route("/editar", name="pizza_editar")
     */
    public function editarPizza()
    {
        
        return $this->render('pizza/index.html.twig', [
            
        ]);
    }
    /**
     * @Route("/show", name="pizza_mostrar")
     */
    public function mostrarPizza()
    {
        
        return $this->render('pizza/mostrar.html.twig', [ 
            
        ]);
    }
    /**
     * @Route("/pizza/nombre/{parametro}", name="pizza_nombre")
     */
    public function nombrePizza($parametro)
    {
        
        return $this->render('pizza/nombre.html.twig', [ 
            'cliente' => $parametro
        ]);
    }
    /**
     * @Route("/calcular/{precio}", name="pizza_calcular", requirements={"precio"="\d+"})
     */
    public function calcularPizza($precio)
    {
        $final = $precio * 1.21;
        return $this->render('pizza/nombre.html.twig', [ 
            'preciofinal' => $final,
        ]);
    }
}

