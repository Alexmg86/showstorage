<?php

namespace alexmg86\ShowStorage;

use Illuminate\Support\Facades\Storage;

class ShowStorage
{
	/**
	 * Main method to get all files and folders
	 * @return [type] [description]
	 */
    public static function getFiles($path = null)
    {
    	$path = $path ? $path : storage_path('app');
    	$allFiles = [];
    	$folders = self::getItems($path, 1);
        $allFiles['dir_/']['path'] = encrypt($path);
        $allFiles['dir_/']['files'] = self::checkFiles($path);
    	if ($folders) {
    		foreach ($folders as $folder) {
    			$allFiles['dir_'.$folder] = self::checkDir($folder, $path);		
    		}
    	}
    	return $allFiles;
    }

    /**
     * Get the list of files or folders.
     * @param  string  $path [description]
     * @param  integer $type [description]
     * @return array         [description]
     */
    private static function getItems($path, $type)
    {
    	$list = [];
        $items = array_diff(scandir($path), array('.','..'));// 
    	foreach ($items as $item) {
    		if($type == 1 && is_dir($path . '/' . $item)) {
    			$list[] = $item;
    		}
    		if($type == 2 && is_file($path . '/' . $item)) {
    			$list[] = $item;
    		}
    	}
    	return count($list) > 0 ? $list : null;
    }

    /**
     * Handling a folder for other folders or files
     * @param  string $folder [description]
     * @param  string $path   [description]
     * @return array          [description]
     */
    private static function checkDir($folder, $path = '')
    {
    	$path = $path . '/' . $folder;
    	$allFiles['dir_/']['path'] = encrypt($path);
        $allFiles['dir_/']['files'] = self::checkFiles($path);
    	$folders = self::getItems($path, 1);
    	if ($folders) {
    		foreach ($folders as $folder) {
    			$allFiles['dir_'.$folder] = self::checkDir($folder, $path);		
    		}
    	}
    	return $allFiles;
    }

    /**
     * Get files data from folder
     * @param  string $path [description]
     * @return array        [description]
     */
    private static function checkFiles($path = '')
    {
    	$files = self::getItems($path, 2);
    	$filesInfo = null;
    	if($files) {
    		foreach ($files as $key => $file) {
    			$bytes = filesize($path . '/' . $file);
    			$filesInfo[$key]['size'] =  self::formatBytes($bytes);
    			$filesInfo[$key]['name'] =  $file;
                $filesInfo[$key]['path'] =  encrypt($path . '/' . $file);
    		}
    	}
    	return $filesInfo;
    }

    /**
     * Convert file size to human
     * @param  integer  $bytes    [description]
     * @param  integer $precision [description]
     * @return string             [description]
     */
    private static function formatBytes($bytes, $precision = 2) { 
    	$units = array('b', 'Kb', 'Mb', 'Gb', 'Tb'); 
    	$bytes = max($bytes, 0); 
    	$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    	$pow = min($pow, count($units) - 1); 
    	return round($bytes, $precision) . ' ' . $units[$pow]; 
    } 

    /**
     * Delete files and folders from request
     * @param  array $items  array paths from request
     */
    public static function deleteFiles($items)
    {
        foreach ($items as $types) {
            foreach ($types as $item) {
                $path = decrypt($item);
                if (is_file($path)) {
                    unlink($path);
                } elseif (is_dir($path)) {
                    self::delDir($path);
                }
            }
        }
    }

    /**
     * Delete folder with all files inside
     * @param  string $path Path to folder
     */
    private static function delDir($path) { 
        $files = array_diff(scandir($path), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$path/$file")) ? delTree("$path/$file") : unlink("$path/$file"); 
        }
        rmdir($path); 
    }
}