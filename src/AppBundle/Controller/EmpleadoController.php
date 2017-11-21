<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Empleado;
use AppBundle\Form\EmpleadoType;



class EmpleadoController extends Controller
{
   
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('AppBundle:Empleado')->findAll();

        return $this->render('empleado/index.html.twig', array(
            'empleados' => $empleados,
        ));
    }

   
    public function newAction(Request $request)
    {
        $empleado = new Empleado();
        $form = $this->createForm(EmpleadoType::class, $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('empleado_show', array('id' => $empleado->getIdEmpleado()));
        }

        return $this->render('empleado/new.html.twig', array(
            'empleado' => $empleado,
            'form' => $form->createView(),
        ));
    }

   
    public function showAction(Empleado $empleado)
    {
        return $this->render('empleado/show.html.twig', array(
            'empleado' => $empleado,           
        ));
    }

   
    public function editAction(Request $request, Empleado $empleado)
    {
        $editForm = $this->createForm(EmpleadoType::class, $empleado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('empleado_edit', array('id' => $empleado->getIdEmpleado()));
        }

        return $this->render('empleado/edit.html.twig', array(
            'empleado' => $empleado,
            'edit_form' => $editForm->createView(),            
        ));
    }

     public function deleteAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $avi_repo = $em->getRepository("AppBundle:Empleado");
        $avi = $avi_repo->find($id);
        
        $em->remove($avi);
        $em->flush();
        
        return $this->redirectToRoute('empleado_index');        
    }
}
