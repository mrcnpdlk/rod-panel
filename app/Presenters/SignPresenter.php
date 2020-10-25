<?php

declare(strict_types=1);

namespace Mrcnpdlk\ROD\App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class SignPresenter extends BasePresenterAbstract
{
    protected function createComponentSignInForm(): Form
    {
        $form = new Form();
        $form->addText('username', 'Username:')
             ->setRequired('Please enter your username.')
        ;

        $form->addPassword('password', 'Password:')
             ->setRequired('Please enter your password.')
        ;

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];

        return $form;
    }

    public function signInFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Incorrect username or password.');
        }
    }

    public function actionOut(): void
    {
        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.');
        $this->redirect('Homepage:');
    }
}
