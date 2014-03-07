<?php

namespace Sd\BaseBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    protected function redirectTo($route, $params = array())
    {
        return $this->redirect($this->generateUrl($route, $params));
    }

    protected function getODM()
    {
        return $this->container->get('doctrine.odm.mongodb.document_manager');
    }

    protected function getORM()
    {
        return $this->container->get('doctrine.orm.entity_manager');
    }

    protected function createQueryBuilder($name)
    {
        return $this->getODM()->createQueryBuilder($name);
    }

    protected function getRepository($name)
    {
        return $this->getODM()->getRepository($name);
    }

    protected function isGranted($role)
    {
        return $this->container->get('security.context')->isGranted($role);
    }

    protected function getUserOrDeny($checkUser = null)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user)) { //  || !$user instanceof UserInterface) {
            throw new AccessDeniedException('Sorry, you do not have access to this section.');
        }
        if (is_object($checkUser)) {
            if (!$user->getId() == $checkUser->getId()) {
                throw new AccessDeniedException('Sorry, you do not have access to this section.');
            }
        }
        return $user;
    }

    protected function setFlash($type, $message)
    {
        $this->getSession()->getFlashBag()->set($type, $message);
    }

    protected function getSession()
    {
        return $this->get('session');
    }
}
