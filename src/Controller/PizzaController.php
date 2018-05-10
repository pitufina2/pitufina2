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
    	
    	$vector = array ("Margarita", "Carbonara", "Hawaiana");
    	
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'minombre' => 'Jesus',
            'pizzas'=> $vector
            
           
        ]);
    }

    /**
     * @Route("/nueva", name="pizza_nueva")
     */
    public function nuevaPizza()
    {
    	
    	
        return $this->render('pizza/nuevo.html.twig', [
           
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
     * @Route("/editar", name="pizza_editar")
     */
    public function editarPizza()
    {
    	
    	$vectorciudades =  array ("Alburquerque", "Badajoz", "Sevilla");
        return $this->render('pizza/editar.html.twig', [
            'ciudades'=> $vectorciudades
            
        ]);
    }
		/**
     * @Route("/detalle/{posicion}", name="tienda_detalle", requirements={"posicion"="\d+"} )
     */
    public function calcularPizza($precio)
    {
    	
    	$final = $precio * 1.21;
        return $this->render('pizza/nombre.html.twig', [
        	'preciofinal'=> $final
            
        ]);
    }
    
   
}