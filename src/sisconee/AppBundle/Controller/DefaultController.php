<?php

namespace sisconee\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\SecurityContextInterface;


class DefaultController extends Controller
{
    public function indexAction($name = "carlos")
    {
        return $this->render('sisconeeAppBundle:Default:index.html.twig', array('name' => $name));
    }

    public function pruebaAction()
    {
        return $this->render('sisconeeAppBundle:Default:prueba2.html.twig');
    }

    public function loginAction(Request $request)
    {

        /*$securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) //hay usuario logueado
        {
        $url = $this->generateUrl('usuario_logout');
        return $this->redirect($url);}*/

        //try {
        $session = $request->getSession();
// get the login error if there is one
        /*if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session &&
            $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)
        ) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }else {$error='';}*/
// diferenciando el tipo de error entre usuario desactivado y contraseña  usuario invalidos
        $error = false;

        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);

        }

        if (!$error && !is_null($session) && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }


        $error_msg = false;

        if (is_a($error, 'Exception')) {
            $error_msg = $error->getMessage() . ' ' . $error->getCode();

            if (is_a($error, 'Symfony\Component\Security\Core\Exception\DisabledException')) {
                // $error = $error->getMessage();
                $error_msg = 'Su usuario se encuentra  desactivado por favor contacte al administrador.';

            }

            if (is_a($error, 'Symfony\Component\Security\Core\Exception\BadCredentialsException')) {
            // $error = $error->getMessage();
                $error_msg = 'Usuario o contraseña incorrectos por favor verifíquelos.';
            }
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' :
            $session->get(SecurityContextInterface::LAST_USERNAME);


        /*}
        catch(DisabledException $e)
        {
            $error = 'No se puede loguear porque el usuario está desactivado';

        }
        catch(Exception $e)
        {
            $error = $e->getMessage();
        }*/

        return $this->render(
            'sisconeeAppBundle:Default:login.html.twig',
            array(
// last username entered by the user
                'last_username' => $lastUsername,
                'error' => $error_msg,
            )
        );
    }
}
