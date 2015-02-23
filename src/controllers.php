<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})
->bind('homepage')
;

$app->get('/add/{num1}/{num2}', function ($num1, $num2) use ($app) {
    
    $calculator = new App\Calculator();
    $sum = $calculator->Add(intval($num1), intval($num2));
    
    return $app['twig']->render('add.html', [
        'num1' => $num1, 'num2' => $num2, 'sum' => $sum
    ]);
})
->bind('homepage')
;

$app->get('/subtract/{num1}/{num2}', function ($num1, $num2) use ($app) {
    
    $calculator = new App\Calculator();
    $difference = $calculator->subtract(intval($num1), intval($num2));
    
    return $app['twig']->render('subtract.html', [
        'num1' => $num1, 'num2' => $num2, 'difference' => $difference
    ]);
})
->bind('homepage')
;


$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
