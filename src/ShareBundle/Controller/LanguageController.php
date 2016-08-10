<?php

namespace ShareBundle\Controller;

use ShareBundle\Entity\Language;
use ShareBundle\Form\LanguageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class LanguageController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $languages = $em->getRepository('ShareBundle:Language')->findAll();
        
        return $this->render('ShareBundle:Language:index.html.twig', array(
            'languages' => $languages,
        ));
    }

    public function newAction(Request $request)
    {
        $language = new Language();
        $form = $this->createForm('ShareBundle\Form\LanguageType', $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('language_index');
        }

        //$language->setLngDev('toto');

        return $this->render('ShareBundle:Language:new.html.twig', array(
            //'language' => $language,
            'form' => $form->createView(),
        ));
    }

    public function editAction(Request $request, Language $language)
    {
        //$deleteForm = $this->createDeleteForm($language);

        $form = $this->createForm('ShareBundle\Form\LanguageType', $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('language_index');
        }

        return $this->render('ShareBundle:Language:edit.html.twig', array(
            //'language' => $language,
            'form' => $form->createView(),
            //'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$language = $em->getRepository('ShareBundle:Language')->find($id);
        $language = $em->getRepository('ShareBundle:Language')->findOneBy(array('id' => $id));

        if ($language) {
            $em->remove($language);
            $em->flush();
        }

        return $this->redirectToRoute('language_index');
    }

}
