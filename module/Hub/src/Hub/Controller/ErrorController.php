<?php

namespace Hub\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ErrorController extends AbstractActionController
{

    public function errorAction()
    {

        $errors = $this->_getParam('error_handler');

        if (!$errors) {
            $this->view->message = 'You have reached the error page';

            return;
        }
        $error_level = 'critical';
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:

                // 404 error -- controller or action not found
                $error_level = 'warning';
                $this->getResponse()->setHttpResponseCode(404);
                $this->view->message = 'Page not found';
                break;
            default:
                // application error
                $this->getResponse()->setHttpResponseCode(500);
                $this->view->message = 'Application error';
                break;
        }

        // Log exception, if logger available
        if ($log = $this->getLog()) {
            if ($error_level == 'warning') {
                $log->warn($this->view->message, $errors->exception);
            } else {
                $log->crit($this->view->message, $errors->exception);
            }
        }

        // conditionally display exceptions
        if ($this->getInvokeArg('displayExceptions') == true) {
            $this->view->exception = $errors->exception;
        }

        $this->view->request = $errors->request;
    }

    public function getLog()
    {

        $log = Core_Log::getInstance();

        return $log;
    }


}

