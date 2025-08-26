<?php

namespace Modules\Media\Services;

use Illuminate\Http\UploadedFile;
use Modules\Media\Entities\Media;
use Modules\Media\External\Contracts\MediaRepositoryInterface;
use Modules\Media\Services\UploadStrategies\UploadStrategyFactory;

class MediaService
{

    public function __construct(
        protected MediaRepositoryInterface $mediaRepository,
        protected UploadStrategyFactory $factory,
        protected ImageProcessingService $imageProcessingService
    ) {}

    public function upload(
        object $model,
        UploadedFile $file,
        string $collection = 'default',
        string $dir = 'uploads/media',
        string $disk = 's3'
    ) {

        $strategy = $this->factory->make($disk);

        $modelClass = get_class($model);
        $moduleName = $this->detectModuleNameFromModel($modelClass);

        // get thumbnails sizes
        $sizes = config("{$moduleName}.media.thumbnails", null);
        if ($sizes) {
            $imagesBinary = $this->imageProcessingService->resizeAndPrepare($file, $sizes);
            $extension = $file->getClientOriginalExtension();
            $baseFilename = uniqid();

            $paths = $strategy->uploadMultiple($imagesBinary, $dir, $baseFilename, $extension, $disk);
        } else {
            $paths['original'] = $strategy->upload($file, $dir);
        }


        $this->mediaRepository->create([
            'mediaable_type' => get_class($model),
            'mediaable_id' => $model->id,
            'collection'  => $collection,
            'file_name'   => $paths['original'],
            'thumbnail_path' => json_encode($paths),
            'origin_name' => $file->getClientOriginalName(),
            'mime_type'   => $file->getMimeType(),
            'disk'        => $disk,
        ]);
    }

    public function delete(Media $media)
    {
        $strategy = $this->factory->make($media->disk);
        $strategy->delete($media->file_name);

        if (!empty($media->thumbnail_path)) {
            $thumbnails = json_decode($media->thumbnail_path, true);

            if (is_array($thumbnails)) {
                foreach ($thumbnails as $path) {
                    //origin file = main file in media
                    if ($path !== $media->file_name) {
                        $strategy->delete($path);
                    }
                }
            }
        }

        $this->mediaRepository->delete($media);
    }

    protected function detectModuleNameFromModel(string $modelClass): string
    {
        // get module name from model
        $parts = explode('\\', $modelClass);
        if (count($parts) > 1) {
            return strtolower($parts[1]);
        }
        return 'core'; // default
    }
}
