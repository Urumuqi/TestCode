<?php

/**
 * 同步kafka消息
 *
 * @return $this
 */
function syncRecordKafka()
{
    $topic = \Kafka\Producer::instance('default')->newTopic($this->getKafkaTopic());
    $topic->produce(RD_KAFKA_PARTITION_UA, 0, $this->kafkaMessage);
    return $this;
}

/**
 * 根据channel获取相应的topic
 *
 * @return mixed
 *
 * @throws \RpcBusinessException
 */
function getKafkaTopic()
{
    if (!empty(\Config\Dove::$channelKafkaTopic[$this->channel])) {
        return \Config\Dove::$channelKafkaTopic[$this->channel];
    }

    throw new \RpcBusinessException('channel kafka config inexistence!');
}
