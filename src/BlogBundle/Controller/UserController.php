<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//Se agrega el request
use Symfony\Component\HttpFoundation\Request;
//Libreria para usar flag data
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{	
	//Se declara la session asi para tener la variable disponible en todo este controlador
	private $session1,$session2;
	
	public function __construct() {
		$this->session1=new Session();
		$this->session2=new Session();
	}
	
	
	public function loginAction(Request $request){
		//Codigo para autenticacion normal
		$autenticationUtils=$this->get("security.authentication_utils");
		$error=$autenticationUtils->getLastAuthenticationError();
		$lastUsername=$autenticationUtils->getLastUsername();
		
		/*
		
		$user=new Users();
		$form=$this->createForm(UserType::class,$user);
		$form->handleRequest($request);
		
		if($form->isValid()){
			$status="Formulario Valido";
			$data=array(
				"titulo"=>$form->get("titulo")->getData(),
				"descripcion"=> $form->get("descripcion")->getData(),
				"precio"=> $form->get("precio")->getData()
			);	
		}else
		*/
		
		//Mensajes con flash
		$incorrecto="Datos incorrectos";
		$this->session1->getFlashBag()->add("resp1",$incorrecto);
		$correcto="Bienvenido";
		$this->session2->getFlashBag()->add("resp2",$correcto);
		
		
		
		return $this->render("BlogBundle:User:login.html.twig",array(
			"error"=> $error,
			"lastUsername"=> $lastUsername
			
		));
	}
	
	
	
	
	
	
	
}
