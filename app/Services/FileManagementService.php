<?php

namespace App\Services;

class FileManagementService
{
    
    public function __construct()
    {
        
    }

    public function saveFile($file, $folder)
    {
        return $file->store($folder, 'public');
    }
     public function store($file, $path)
    {
        return $file->store($path, 'public');
    }
}