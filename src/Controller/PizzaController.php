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
    	$vectordos = array ("tomate", "atun","queso");
        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'minombre' => 'Jesus',
            'pizzas'=> $vector,
            'ingredientes'=> $vectordos
        ]);
    }

    /**
     * @Route("/pizza/nueva", name="pizza_nueva")
     */
    public function nuevaPizza()
    {
    	
    	
        return $this->render('pizza/index.html.twig', [
            
        ]);
    }
}