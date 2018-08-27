<?php

namespace App\Serializer;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;

/**
 * Class CustomContextSerializer
 * @package AppBundle\Serializer
 */
class CustomContextSerializer extends Serializer
{
    public function serialize($data, $format, SerializationContext $context = null)
    {
        $context = new SerializationContext();
        $context->setGroups([$data['data']['group']]);
        $data = array('data' => $data['data']['data']);

        return parent::serialize($data, $format, $context);
    }
}