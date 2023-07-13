<?php

namespace App\Generator;

use Dompdf\Dompdf;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Twig\Environment;

abstract class AbstractGenerator
{
    private Environment $twig;

    private Dompdf $pdf;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
        $this->pdf = new Dompdf();
    }

    abstract public function getType(): string;

    final public function generate(object $item): string {
        $content = $this->twig->render('pdf/' . $this->getType(), ['item' => $item]);
        $this->pdf->loadHtml($content);
        $this->pdf->render();

        return $this->pdf->output();
    }
}