<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Asignacion;
use AppBundle\Form\AsignacionType;


class AsignacionController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $asignacions = $em->getRepository('AppBundle:Asignacion')->findAll();

        return $this->render('asignacion/index.html.twig', array(
            'asignacions' => $asignacions,
        ));
    }
    
 public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $reservacions = $em->getRepository('AppBundle:Asignacion')->findAll();
                                                
        return $this->render('asignacion/login.html.twig', array(
            'reservacions' => $reservacions,
        ));
    }
    
    public function newAction(Request $request)
    {
        $asignacion = new Asignacion();
        $form = $this->createForm(AsignacionType::class, $asignacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignacion);
            $em->flush();

            return $this->redirectToRoute('asignacion_show', array('id' => $asignacion->getIdAsignacion()));
        }

        return $this->render('asignacion/new.html.twig', array(
            'asignacion' => $asignacion,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Asignacion $asignacion)
    {
        return $this->render('asignacion/show.html.twig', array(
            'asignacion' => $asignacion,
        ));
    }

    public function editAction(Request $request, Asignacion $asignacion)
    {
        $editForm = $this->createForm(AsignacionType::class, $asignacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignacion);
            $em->flush();

            return $this->redirectToRoute('asignacion_edit', array('id' => $asignacion->getIdAsignacion()));
        }

        return $this->render('asignacion/edit.html.twig', array(
            'asignacion' => $asignacion,
            'edit_form' => $editForm->createView(),
        ));
    }

     public function deleteAction($id)
    {  
        $em = $this->getDoctrine()->getEntityManager();
        $avi_repo = $em->getRepository("AppBundle:Asignacion");
        $avi = $avi_repo->find($id);
        
        $em->remove($avi);
        $em->flush();
        
        return $this->redirectToRoute('asignacion_index');        
    }
}
