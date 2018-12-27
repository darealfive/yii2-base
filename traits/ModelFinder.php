<?php

namespace darealfive\base\traits;

use darealfive\base\components\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Trait ModelFinder provides common implementation of @see \darealfive\base\interfaces\ModelFinder interface.
 * It reduces the overhead of finding a model to returning the model of the desired class to be found.
 *
 * @package darealfive\base\traits
 */
trait ModelFinder
{
    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @see \darealfive\base\interfaces\ModelFinder::findModel() this trait is covering
     *
     * @param mixed        $id    the primary key of the model
     * @param ActiveRecord $model optional model to find a model of this class
     *
     * @return ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id, ActiveRecord $model = null): ActiveRecord
    {
        /*
         * Lazy pattern
         */
        $model = $model ?? $this->getModel();
        if (($model = $model::findOne($id)) !== null) {

            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Gets the desired model to be found by @see findModel.
     *
     * @return ActiveRecord
     */
    protected abstract function getModel(): ActiveRecord;
}