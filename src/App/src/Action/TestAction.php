<?php

namespace App\Action;

use App\Entity\Article;
use App\Form\Form;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TestAction implements MiddlewareInterface
{
    protected $templateRenderer;
    protected $form;
    
    public function __construct(TemplateRendererInterface $renderer, Form $form)
    {
        $this->templateRenderer = $renderer;
        $this->form = $form;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $article = new Article();

        $this->form->bind($article);

        if ('POST' !== $request->getMethod()) {
            return new HtmlResponse(
                $this->templateRenderer->render(
                    'app::test',
                    ['form' => $this->form]
                )
            );
        }

        $this->form->setData($request->getParsedBody());

        if (!$this->form->isValid()) {
            return new HtmlResponse(
                $this->templateRenderer->render(
                    'app::test',
                    ['form' => $this->form]
                )
            );
        }

        return new HtmlResponse('ok');
    }
}