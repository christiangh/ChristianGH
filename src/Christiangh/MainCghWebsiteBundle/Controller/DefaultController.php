<?php

namespace Christiangh\MainCghWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Christiangh\MainCghWebsiteBundle\Entity\Email;
use Christiangh\MainCghWebsiteBundle\Entity\Content;
use Christiangh\MainCghWebsiteBundle\Entity\CategoryContent;
use Christiangh\MainCghWebsiteBundle\Entity\CollectionContent;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    
    public function contentsAction(Request $request)
    {
        //Open connection
        $em = $this->getDoctrine()->getManager();
        
        $contents = $em->getRepository('ChristianghMainCghWebsiteBundle:Content')->findAll();
        
        return $this->render('ChristianghMainCghWebsiteBundle:Default:contents.html.twig', array('current_section_class' => 'contents_color', 'contents' => $contents));
    }
    
    public function contentAction(Request $request)
    {
        //Open connection
        $em = $this->getDoctrine()->getManager();
        
        $url_structure = explode("/", $request->get('content'));
        $content_url = $url_structure[1];
        
        $content = $em->getRepository('ChristianghMainCghWebsiteBundle:Content')->findOneByUrl( $content_url, $request->get('_locale') );
        
        if(empty($content)){
            //Content's name not found
            throw new NotFoundHttpException("Page not found");
        }
        
        $final_content_url = $content->getCategory()->getUrl($request->get('_locale'))."-".$content->getCollection()->getUrl($request->get('_locale'))."/".$content->getUrl($request->get('_locale'));
        
        if($final_content_url != $request->get('content')){
            //Incorrect content's name or incorrect url
            throw new NotFoundHttpException("Page not found");
        }
        
        return $this->render('ChristianghMainCghWebsiteBundle:Default:content.html.twig', array('current_section_class' => 'contents_color', 'content' => $content));
    }
    
    public function webMapAction(Request $request)
    {
        if($request->get('_format') == "html"){
            return $this->render('ChristianghMainCghWebsiteBundle:Default:webMap.html.twig', array('current_section_class' => 'home_color'));
        }else{
            //Open connection
            $em = $this->getDoctrine()->getManager();
            
            $static_urls = array();
            switch($request->get('_locale')){
                case "es": $static_urls[] = "http://www.christiangh.com/";
                           $static_urls[] = "http://www.christiangh.com/es/mi-curriculum-vitae.html";
                           $static_urls[] = "http://www.christiangh.com/es/contacto.html";
                           $static_urls[] = "http://www.christiangh.com/es/contenidos.html";
                    break;
                
                case "en": $static_urls[] = "http://www.christiangh.com/en/";
                           $static_urls[] = "http://www.christiangh.com/en/my-curriculum-vitae.html";
                           $static_urls[] = "http://www.christiangh.com/en/contact.html";
                           $static_urls[] = "http://www.christiangh.com/en/contents.html";
                    break;
            }
            
            $content_urls = $em->getRepository('ChristianghMainCghWebsiteBundle:Content')->getAllUrls( "http://www.christiangh.com", $request->get('_locale') );
            
            $urls = array_merge($static_urls, $content_urls);
            
            return $this->render('ChristianghMainCghWebsiteBundle:Default:webMap.xml.twig', array('urls' => $urls));
        }
    }
}
