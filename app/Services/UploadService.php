<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Exceptions\InvalidUserInputException;

/**
 * Class UploadService
 *
 * @package App\Services
 */
class UploadService
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var string
     */
    public $keyName;

    /**
     * Get the request.
     *
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * Set the request object.
     *
     * @param Request $request
     *
     * @return $this
     */
    public function setRequest(Request $request): UploadService
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get the key from request that has the file.
     *
     * @return string
     */
    public function getKeyName(): string
    {
        return $this->keyName;
    }

    /**
     * Set the key from request that has the file.
     *
     * @param string $keyName
     *
     * @return $this
     */
    public function setKeyName(string $keyName): UploadService
    {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * Get File from request.
     *
     * @return \Illuminate\Http\UploadedFile
     */
    public function getFile()
    {
        return $this->getRequest()->file($this->getKeyName());
    }

    /**
     * Get Storage driver from request.
     *
     * @return string
     */
    public function getStorage(): string
    {
        return $this->request->get('storage') ?? 'uploads';
    }

    /**
     * Get File Path from request object.
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->request->has('path') ? trim($this->request->get('path'), '/') : '';
    }

    /**
     * Get the file.
     *
     * @return string
     */
    public function getFileName(): string
    {
        return $this->request->get('file_name') ?? str_random(40);
    }

    /**
     * Get the File extention.
     *
     * @return string
     */
    public function getFileExtention()
    {
        return $this->getFile()->getClientOriginalExtension();
    }

    /**
     * Get the Mime type of the file.
     *
     * @return null|string
     */
    public function getMimeType()
    {
        return $this->getFile()->getClientMimeType();
    }

    /**
     * Get the size of the file.
     *
     * @return int
     */
    public function getFileSize()
    {
        return $this->getFile()->getSize();
    }

    /**
     * Get Size unit.
     *
     * @return string
     */
    public function getSizeUnit()
    {
        return 'bytes';
    }

    /**
     * Process the uploaded file.
     *
     * @param Request|null $request
     * @param string|null  $keyName
     *
     * @return array
     */
    public function process(Request $request = null, string $keyName = null)
    {
        $this->setProperties($request, $keyName);

        return [
            'path'      => $this->storeFile(),
            'extention' => $this->getFileExtention(),
            'mime_type' => $this->getMimeType(),
            'size'      => $this->getFileSize(),
            'size_unit' => $this->getSizeUnit()
        ];
    }

    /**
     * Store File.
     *
     * @return false|string
     */
    public function storeFile()
    {
        return $this
            ->getFile()
            ->storePubliclyAs(
                'uploads/'.$this->getFilePath().$this->request->user()->uuid,
                $this->request->has('file_name')
                    ? $this->getFileName()
                    : $this->getFileName() .'.'. $this->getFileExtention(),
                $this->getStorage()
            );
    }

    /**
     * Set the required properties for the service.
     *
     * @param $request
     * @param $keyName
     *
     * @throws InvalidUserInputException
     */
    public function setProperties($request, $keyName)
    {
        if (! $this->request) {
            $this->setRequest($request);
        }

        if (! $this->keyName) {
            $this->setKeyName($keyName);
        }

        if (! $this->getFile()->isValid()) {
            throw new InvalidUserInputException(
                trans(
                    'api.validations.uploads.empty_file',
                    ['attribute' => $this->getKeyName()]
                )
            );
        }
    }
}
