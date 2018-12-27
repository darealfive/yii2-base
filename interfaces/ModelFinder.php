<?php

namespace darealfive\base\interfaces;

use darealfive\base\components\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * Interface ModelFinder
 *
 * @package darealfive\base\interfaces
 */
interface ModelFinder
{
    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param mixed        $id    the primary key of the model
     * @param ActiveRecord $model optional model to find a model especially of this class
     *
     * @return ActiveRecord
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id, ActiveRecord $model = null): ActiveRecord;
}