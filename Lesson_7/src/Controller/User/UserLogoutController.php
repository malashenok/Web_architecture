<?php


namespace Controller\User;


use Framework\BaseController;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLogoutController extends BaseController
{
    /**
     * Выходим из системы
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function logoutAction(Request $request): Response
    {
        (new Security($request->getSession()))->logout();

        return $this->redirect('index');
    }

}