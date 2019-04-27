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
    public const CREATE = 'create';
    public const READ = 'view';
    public const UPDATE = 'update';
    public const DELETE = 'delete';

    public const INDEX = 'index';
}