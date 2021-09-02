<?php
/**
 * Created By
 * Date:2021/6/27
 * Author:jhwu
 */

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{


    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );
        return new JsonResponse($data);
//        return new Response(
//            json_encode($data),
//            200,
//            array('Content-Type' => 'application/json')
//        );
    }


    /**
     * @Route("/lucky/number/{count}")
     */
    public function numberAction($count,LoggerInterface $logger)
    {
        $logger->info('We are logging!');

        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
//        $numbersList = implode(', ', $numbers);
//
//        return new Response(
//            '<html><body>Lucky numbers: '.$numbersList.'</body></html>'
//        );

        $numbersList = implode(', ', $numbers);

        return $html = $this->render('number.html.twig',array('luckyNumberList' => $numbersList));

    }
}