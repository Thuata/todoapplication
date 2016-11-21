<?php
/*
 * The MIT License
 *
 * Copyright 2015 Anthony Maudry <anthony.maudry@thuata.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace AppBundle\Controller;

use AppBundle\Service\TodoManagementService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * <b>TodoController</b><br>
 *
 *
 * @package AppBundle\Controller
 *
 * @author  Anthony Maudry <anthony.maudry@thuata.com>
 */
class TodoController extends Controller
{
    /**
     * Index action
     *
     * @return Response
     *
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('Todo/index.html.Twig');
    }

    /**
     * Action to create a new list
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/list/create-list.html", name="create_list")
     */
    public function createListAction(Request $request)
    {
        $formBuilder = $this->createFormBuilder();

        $formBuilder->add('name', 'text', [
            'label' => 'Name'
        ]);

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $name = $form->get('name')->getData();

            /** @var TodoManagementService $service */
            $service = $this->container->get('thuata_framework.servicefactory')->getService(TodoManagementService::class);

            $service->createList($name);

            // We redirect to home for the moment with a 201 "CREATED" HTTP status
            return $this->redirect($this->generateUrl('home', 201));
        }

        return $this->render('Todo/create-list.html.twig', [
            'listForm' => $form->createView()
        ]);
    }
}