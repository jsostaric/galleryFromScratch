<?php

class UsersController
{
    public function show()
    {
        $view = new View;

        if(!Session::getInstance()->isLoggedIn()){
            header('Location: ../login');
        }

        $view->render('private/myAccount');
    }

    public function edit()
    {
        $view = new View;

        if(!Session::getInstance()->isLoggedIn()){
            header('Location: ../login');
        }

        $view->render('private/edit');
    }

    public function update()
    {
        $view = new View;

        $message = User::passwordCheck($_POST);

        if($message != ''){
            $view->render('private/edit', compact('message'));
        }else{
            try {
                User::updatePassword($_POST);

                $success = 'You successfully changed your password.';
                $view->render('private/index', compact('success'));
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    public function destroy()
    {
        User::remove();
        Session::getInstance()->logout();

        header('Location: /');
    }
}