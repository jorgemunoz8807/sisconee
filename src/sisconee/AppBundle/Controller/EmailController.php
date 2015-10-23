<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6/30/14
 * Time: 11:16 PM
 */

namespace sisconee\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmailController extends Controller
{
    public function SendEmailAction($name, $password, $email)
    {
        $request = $this->getRequest();
        //$name = $request->request->get('txtName');
        //$email = $request->request->get('txtEmail');
        //$comment = $request->request->get('txtMessage');
        //$comment = $request->request->get('txtMessage');
        $message = \Swift_Message::newInstance()
            ->setContentType("text/html")

            ->setSubject('Sisconee: ' . $name)
            ->setFrom('admin@citmatel.inf.cu')
            ->setTo($email)
            ->setBody($this->renderView('sisconeeAppBundle:Default:message.html.twig', array(
                'name' => $name,
                'email' => $email,
                //'comment' => $comment,
                'password' => $password
            )));


        $success = $this->get('mailer')->send($message);
        $success = 'sdf';
        //return $this->render('sisconeeAppBundle:Default:index.html.twig');
    }
} 