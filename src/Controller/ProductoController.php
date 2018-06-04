<?php
namespace App\Controller;
use App\Entity\Producto;
use App\Form\ProductoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * @Route("/producto")
 */
class ProductoController extends Controller
{
    /**
     * @Route("/lista", name="producto_lista")
     */
    public function index(Request $request)
    {
        $p = new Producto();
        $formu = $this->createForm(ProductoType::class, $p);
        $formu->handleRequest($request);
        if ($formu->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
        }
        $repo = $this->getDoctrine()->getRepository(Producto::class);
        $productos = $repo->findAll();
        return $this->render('producto/index.html.twig', [
            'productos' => $productos,
            'formulario' => $formu->createView()
        ]);
    }
    /**
     * @Route("/nuevo", name="producto_nuevo")
     */
    public function nuevo(Request $request)
    {
    	$p = new Producto();
    	$formu = $this->createForm(ProductoType::class, $p);
    	$formu->handleRequest($request);
    	if ($formu->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
			return $this->redirectToRoute('producto_lista');   		
    	}
        return $this->render('producto/nuevo.html.twig', [
            'formulario' => $formu->createView(),
        ]);            
    }
}
