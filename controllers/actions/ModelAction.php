<?php

namespace darealfive\base\controllers\actions;

use darealfive\base\behaviors\action\preload\SingleActiveRecordBehavior;

/**
 * Class ModelAction
 *
 * @package darealfive\base\controllers\actions
 *
 * @mixin SingleActiveRecordBehavior via behaviors
 */
abstract class ModelAction extends Action
{
    private $modelLoader;

    protected function setModelLoader(callable $modelLoader): void
    {
        $this->modelLoader = $modelLoader;
    }

    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return array_merge(parent::behaviors(), [
            [
                'class'        => SingleActiveRecordBehavior::class,
                'entityLoader' => $this->modelLoader
            ]
        ]);
    }

}