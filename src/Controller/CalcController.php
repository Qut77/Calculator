<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class CalcController extends AbstractController
{
    #[Route('/', name: 'app_calc', methods:['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $result = null;

        if($request->isMethod('POST')) {
            $number1 = (float) $request->request->get('number1');
            $number2 = (float) $request->request->get('number2');
            $operator = $request->request->get('operation');

            $result = match($operator){
                "add" => $number1 + $number2,
                "subtract" => $number1 - $number2,
                "multiply" => $number1 * $number2,
                "divide" => $number2 != 0 ? $number1 / $number2 : "Ошибка деления на ноль",
            };

            $request->getSession()->set('result', $result);
            return $this->redirectToRoute('app_calc');
        }
        $result = $request->getSession()->get('result');
        $request->getSession()->remove('result');

        return $this->render('calc/index.html.twig', [
            'result' => $result
        ]);
    }
}
