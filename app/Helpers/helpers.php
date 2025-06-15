<?php

if (!function_exists('stockImage')) {
    function stockImage($path = 'stock_image.jpg'): string
    {
        return asset('images/' . $path);
    }
}

if (!function_exists('storageAsset')) {
    function storageAsset($path): string
    {
        return asset('storage/' . ltrim($path, '/'));
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $model, $folder = 'images'): void
    {
        if ($model->image_path && Storage::exists('public/' . $model->image_path)) {
            Storage::delete('public/' . $model->image_path);
        }

        $imageName = $folder . '/' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('app/public/' . $folder), basename($imageName));
        $model->image_path = $imageName;

        $model->save();
    }
}

if (!function_exists('deleteImageIfExists')) {
    function deleteImageIfExists(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }
}
