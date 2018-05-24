<?php

namespace App\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/cliente")
     */

class ClienteController extends Controller
{
    /**
     * @Route("/nuevo", name="cliente_nuevo")
     */
    public function index(Request $request)
    {
        $cliente = new Cliente();
        $formu = $this->createForm(ClienteType::class, $cliente);
        $formu->handleRequest($request);

        if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($cliente);

            $em->flush();


            return $this->redirectToRoute('cliente_lista');
          
        }

        return $this->render('cliente/nuevo.html.twig', [
            'formulario' => $formu->createView(),
        ]);
        
    }

    /**
     * @Route("/lista", name="cliente_lista")
     */
    public function listado()
    {

        //$this->cargarDatos();
        $repo = $this->getDoctrine()->getRepository (Cliente::class);

        $clientes = $repo->findAll();    

     

        return $this->render('cliente/index.html.twig', [
            'clientes' => $clientes,
             
            
        ]);
    }


    /**
     * @Route("/detalle/{id}", name="cliente_detalle", requirements={"id"="\d+"})
     */
    public function show(Cliente $cliente): Response
    {
        return $this->render('cliente/show.html.twig', ['cliente' => $cliente]);
    }




    /**
     * @Route("/jsonlist", name="cliente_jsonlist")
     */
    public function jsonClientes()
    {

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        $serializer = new Serializer(array($normalizer), array($encoder));

        $repo = $this->getDoctrine()->getRepository(Cliente::class);
        $clientes = $repo->findAll();
        $jsonClientes = $serializer->serialize($clientes, 'json');        

        $respuesta = new Response($jsonClientes);
        
        return $respuesta;
    }

}