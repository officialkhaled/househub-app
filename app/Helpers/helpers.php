<?php

if (!function_exists('formatTaka')) {
    function formatTaka($amount): string
    {
        return number_format($amount, 2) . ' Tk.';
    }
}

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
        if ($model->avatar && Storage::exists('public/' . $model->avatar)) {
            Storage::delete('public/' . $model->avatar);
        }

        $imageName = $folder . '/' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('app/public/' . $folder), basename($imageName));
        $model->avatar = $imageName;

        $model->save();
    }
}

if (!function_exists('deleteFileIfExists')) {
    function deleteFileIfExists(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        return false;
    }
}
