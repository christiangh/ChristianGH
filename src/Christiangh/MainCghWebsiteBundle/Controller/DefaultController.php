<?php

namespace Christiangh\MainCghWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Christiangh\MainCghWebsiteBundle\Entity\Email;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function homepageAction(Request $request)
    {
        
        return $this->render('ChristianghMainCghWebsiteBundle:Default:index.html.twig', array('current_section_class' => 'home_color'));
    }
    
    public function contactAction(Request $request)
    {
        //Crea un email y le asigna los datos
        $email = new Email();
        $email->setUserName("");
        $email->setUserEmail("");
        $email->setMessage($this->get('translator')->trans('contact.form.message', array()));
        
        $form = $this->createFormBuilder($email)
            ->add('user_name', 'text')
            ->add('user_email', 'email')
            ->add('message', 'textarea')
            ->add('send', 'submit')
            ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
            /** Saving the email in BBDD ***/
            $em = $this->getDoctrine()->getManager();
            $email->setSentDate(new \DateTime("now"));
            $em->persist($email);
            $em->flush();
            
            /** Sending the email **/
            $email_to_send = \Swift_Message::newInstance()
                ->setSubject('Formulario de contacto')
                ->setFrom('cgh@christiangh.com')
                ->setTo('cgh@christiangh.com')
                ->setBody($email->getUserName()." (".$email->getUserEmail().")\n----------------------------------------------------\n\n".$email->getMessage());
            $this->get('mailer')->send($email_to_send);
            
            /** Clearing the form **/
            $email = new Email();
            $email->setUserName("");
            $email->setUserEmail("");
            $email->setMessage($this->get('translator')->trans('contact.form.message', array()));
            
            $form = $this->createFormBuilder($email)
                         ->add('user_name', 'text')
                         ->add('user_email', 'email')
                         ->add('message', 'textarea')
                         ->add('send', 'submit')
                         ->getForm();
            
            $this->get('session')->getFlashBag()->add(
                'notice',
                true
            );
            
            $sent_successfully = true;
        }
        
        return $this->render('ChristianghMainCghWebsiteBundle:Default:contact.html.twig', array('current_section_class' => 'contact_color',
                                                                                                'form' => $form->createView()
                                                                                               ));
    }
    
    public function myCVAction(Request $request)
    {
        return $this->render('ChristianghMainCghWebsiteBundle:Default:myCV.html.twig', array('current_section_class' => 'my_cv_color'));
    }
    
    public function webMapAction(Request $request)
    {
        return $this->render('ChristianghMainCghWebsiteBundle:Default:webMap.html.twig', array('current_section_class' => 'home_color'));
    }
}
