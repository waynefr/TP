<?php

namespace Tp\FdjBundle\EventListener;

use Tp\FdjBundle\Exception\CustomerMessageException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class PublishedMessageExceptionListener
{
    protected $mailer;

    public function __construct($mailer=null)
    {
        $this->mailer = $mailer;
    }
    
    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $code = $exception instanceof CustomerMessageException ? 400 : 500;

        $responseData = [
            'error' => [
                'code' => $code,
                'message' => $exception->getMessage()
            ]
        ];

        $event->setResponse(new JsonResponse($responseData, $code));

        //insert error info in log file  
        $log = new Logger('error');
        $log->pushHandler(new StreamHandler($this->mailer, 400));
        $log->error($exception->getMessage());
    }
}
