<?php

declare(strict_types=1);

namespace Mrcnpdlk\ROD\App\Presenters;

use Mrcnpdlk\ROD\App\Model\SignInFormModel;
use Nette;
use Nette\Application\AbortException;
use Nette\Application\UI\Form;

final class SignPresenter extends BasePresenterAbstract
{
    /**
     * @throws AbortException
     */
    public function renderIn(): void
    {
        if ($this->getUser()->isLoggedIn()) {
            $this->redirect('Home:');
        }
    }

    /**
     * @throws AbortException
     */
    public function renderOut(): void
    {
        $this->getUser()->logout();
        $this->redirect('Sign:in');
    }

    /**
     * @param Form $form
     * @param SignInFormModel $values
     *
     * @throws AbortException
     */
    public function signInFormSucceeded(Form $form, SignInFormModel $values): void
    {
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Home:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Incorrect username or password.');
        }
    }

    protected function createComponentSignInForm(): Form
    {
        $form = new Form();
        $form->addText('username')
            ->setRequired('Pole jest wymagane.')
        ;
        $form->addPassword('password')
            ->setRequired('Pole jest wymagane.')
        ;
        $form->addSubmit('send');
        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }
}
