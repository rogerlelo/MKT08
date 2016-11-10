<?php

namespace CodeEmailMKT\Domain\Service;

interface AuthInterface
{
    public function authenticate($email,$password);
    public function isAuth();//se está autenticado
    public function getUser();
    public function destroy();//destrói autenticação 'logoff'
}