<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PizzaController extends Controller
{
    /**
     * @Route("/pizza", name="pizza")
     */
    public function index()
    {
    	
    	$vector = array ("Margarita", "Carbonara", "Hawaiana");
    	
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'minombre' => 'Jesus',
            'pizzas'=> $vector
            
           
        ]);
    }

    /**
     * @Route("/pizza/nueva", name="pizza_nueva")
     */
    public function nuevaPizza()
    {
    	$ciudades = array ("Badajoz", "Caceres", "Merida");
    	
        return $this->render('pizza/nuevo.html.twig', [
         'ciudades'=> $vectorciudades   
        ]);
    }
    /**
     * @Route("/pizza/mostrar", name="pizza_mostrar")
     */
    public function mostrarPizza()
    {
    	
    	
        return $this->render('pizza/mostrar.html.twig', [
            
        ]);
    }

	/**
     * @Route("/pizza/editar", name="pizza_editar")
     */
    public function editarPizza()
    {
    	
    	
        return $this->render('pizza/editar.html.twig', [
            
        ]);
    }
		/**
     * @Route("/pizza/calcular/{precio}", name="pizza_calcular", requirements={"precio"="\d+"} )
   
     */
    public function calcularPizza($precio)
    {
    	
    	$final = $precio * 1.21;
        return $this->render('pizza/nombre.html.twig', [
        	'preciofinal'=> $final
            
        ]);
    }
   
}