<?php

namespace darealfive\base\controllers\actions;

/**
 * Class View
 *
 * @package darealfive\base\controllers\actions
 */
class View extends ModelAction
{
    /**
     * Displays a single model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function run($id)
    {
        return $this->controller->render($this->controller::READ, [
            'model' => $this->entity,
        ]);
    }
}