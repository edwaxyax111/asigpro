<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Proyecto;
use AppBundle\Form\ProyectoType;

class ProyectoController extends Controller
{
  
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proyectos = $em->getRepository('AppBundle:Proyecto')->findAll();

        return $this->render('proyecto/index.html.twig', array(
            'proyectos' => $proyectos,
        ));
    }

   
    public function newAction(Request $request)
    {
        $proyecto = new Proyecto();
        $form = $this->createForm(ProyectoType::class, $proyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();

            return $this->redirectToRoute('proyecto_show', array('id' => $proyecto->getIdProyecto()));
        }

        return $this->render('proyecto/new.html.twig', array(
            'proyecto' => $proyecto,
            'form' => $form->createView(),
        ));
    }
  
    public function showAction(Proyecto $proyecto)
    {
        return $this->render('proyecto/show.html.twig', array(
            'proyecto' => $proyecto,           
        ));
    }
  
    public function editAction(Request $request, Proyecto $proyecto)
    {
       $editForm = $this->createForm(ProyectoType::class, $proyecto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proyecto);
            $em->flush();

            return $this->redirectToRoute('proyecto_edit', array('id' => $proyecto->getIdProyecto()));
        }

        return $this->render('proyecto/edit.html.twig', array(
            'proyecto' => $proyecto,
            'edit_form' => $editForm->createView(),
       ));
    }

      public function deleteAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $avi_repo = $em->getRepository("AppBundle:Proyecto");
        $avi = $avi_repo->find($id);
        
        $em->remove($avi);
        $em->flush();
        
        return $this->redirectToRoute('proyecto_index');        
    }
}
