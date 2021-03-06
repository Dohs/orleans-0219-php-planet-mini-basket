<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\HistoryManager;
use App\Model\PlaceManager;
use App\Model\PresentationManager;
use App\Model\WhatIsItManager;

/**
 * Class PlaceController
 *
 */
class PresentationController extends AbstractController
{


    /**
     * Display place listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $placeManager = new PlaceManager();
        $places = $placeManager->selectAll();

        $presentationManager = new PresentationManager();
        $presentation = $presentationManager->selectAll();

        $historyManager = new HistoryManager();
        $history = $historyManager->selectAll();

        $whatIsItManager = new WhatIsItManager();
        $whatIsIt = $whatIsItManager->selectAll();

        return $this->twig->render(
            'Presentation/index.html.twig',
            ['places' => $places,
            'presentation' => $presentation,
            'history' => $history,
            'whatIsIt' => $whatIsIt]
        );
    }
}
