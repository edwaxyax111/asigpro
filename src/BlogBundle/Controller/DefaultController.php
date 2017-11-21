<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{	
    public function indexOldAction()
    {
		/*
		//Invocar a la entidad
	$em = $this->getDoctrine()-> getEntityManager();
	$entry_repo=$em->getRepository("BlogBundle:Entries");
	$entries=$entry_repo->findAll();
	
	//manyToOne
	foreach($entries as $entry){
		echo $entry->getTitle()."</br>";
		echo $entry->getCategories()->getName()."</br>"; //Consultado en dos tablas
		echo $entry->getUser()->getName()."</br>";
		
		//Consultando todas las tags oneToMany
		$tags=$entry->getEntryTag();
		foreach($tags as $tag){
			echo $tag->getTag()->getName().", ";
		}
		echo "<hr/>";
	}
	
	
	*/
	
		
		
	/*	
	$em=$this->getDoctrine()->getEntityManager();
	$category_repo=$em->getRepository("BlogBundle:Categories");
	$categories=$category_repo->findAll();
	

	foreach($categories as $category){
		echo $category->getName()."<br/>";
	
		$entries=$category->getEntries();
	
		foreach($entries as $entry){
			echo $entry->getTitle().", ";
		}
		
		 
		echo "<hr/>";
	}
	*/
		
		
	$em=$this->getDoctrine()->getEntityManager();
	$tag_repo=$em->getRepository("BlogBundle:Tags");
	$tags=$tag_repo->findAll();
	

	foreach($tags as $tag){
		echo $tag->getName()."<br/>";
	
		
		$entryTags=$tag->getEntryTag();
	
		foreach($entryTags as $entry){
		   echo $entry->getEntry()->getTitle().", ";
		}

		 
		echo "<hr/>";
	}
		
	die();
		
		
		
        return $this->render('BlogBundle:Default:index.html.twig');
    }
	
	
	
	
	public function indexAction()
	{
	
		
		return $this->render('BlogBundle:Default:index.html.twig');
	}
	
	
	
}
