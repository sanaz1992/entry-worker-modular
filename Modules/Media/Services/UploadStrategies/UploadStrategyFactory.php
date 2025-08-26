<?php

namespace Modules\Media\Services\UploadStrategies;

class UploadStrategyFactory
{
    public function make(string $driver)
    {
        switch ($driver) {
            case 's3':
                return app(LiaraUploadStrategy::class);
            default:
                return app(LiaraUploadStrategy::class);
        }
    }
}
