<?php

declare(strict_types=1);

namespace Netglue\PsrContainer\Messenger;

use Laminas\Stdlib\ArrayUtils;

class Module
{
    public function getConfig(): array
    {
        $config = ArrayUtils::merge(
            (new ConfigProvider())(),
            (new FailureCommandsConfigProvider())(),
        );

        return [
            'service_manager' => $config['dependencies'],
            'symfony' => $config['symfony'],
            'laminas-cli' => $config['laminas-cli'],
        ];
    }
}
