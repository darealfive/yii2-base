<?php
/**
 * Controller class file
 */

namespace darealfive\base\controllers;

use darealfive\base\Module;

/**
 * Class Controller
 *
 * @package darealfive\base\controllers
 *
 * @property Module $module
 */
abstract class Controller extends \yii\web\Controller
{
    /**
     * Action id's of CRUD actions
     */
    const CREATE = 'create';
    const READ = 'view';
    const UPDATE = 'update';
    const DELETE = 'delete';

    const INDEX = 'index';
}