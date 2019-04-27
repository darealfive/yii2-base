<?php

namespace darealfive\base\behaviors\action\preload;

use yii\base\ActionEvent;
use yii\base\InvalidConfigException;

/**
 * Class Behavior ensures to preload anything of any type before the action runs.
 *
 * @package darealfive\base\behaviors\action\preload
 *
 * @property-write callable $entityLoader
 */
abstract class Behavior extends \darealfive\base\behaviors\action\Behavior
{
    /**
     * @var callable to load the entity requested by the action
     */
    private $entityLoader;

    /**
     * @var mixed
     */
    private $entity;

    /**
     * @param callable $entityLoader
     */
    public function setEntityLoader(callable $entityLoader): void
    {
        $this->entityLoader = $entityLoader;
    }

    protected function setEntity($entity): void
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigException if not all necessary properties are set
     */
    public function attach($owner): void
    {
        parent::attach($owner);
        if (!is_callable($this->entityLoader)) {

            throw new InvalidConfigException('Expect "entityLoader" to be callable to preload the entity');
        }
    }

    public function events(): array
    {
        return array_merge(parent::events(), [
            $this->owner::EVENT_BEFORE_RUN => function (ActionEvent $event) {
                $this->setEntity(call_user_func($this->entityLoader, $event->action->controller->actionParams));
            }
        ]);
    }
}