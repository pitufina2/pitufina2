<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Entity\PersonaType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
     * @Route("/persona")
     */
class PersonaController extends Controller
{
    /**
     * @Route("/nuevo", name="persona_nuevo")
     */
    public function index()
    {

    	$persona = new Persona ();
    	$formu = $this->createForm (PersonaType::class ,$persona);


        return $this->render('persona/index.html.twig', [
            'controller_name' => 'PersonaController',
            'formulario' => $formu->createView(),S
        ]);
    }
}
