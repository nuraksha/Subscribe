<?php

class SubscribeOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'SubscribeItem';
    public $classKey = 'SubscribeItem';
    public $languageTopics = ['subscribe'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('subscribe_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('subscribe_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'SubscribeOfficeItemCreateProcessor';