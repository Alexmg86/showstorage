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
    	$allFiles['/'] = self::checkFiles($path);
    	if ($folders) {
    		foreach ($folders as $folder) {
    			$allFiles[$folder] = self::checkDir($folder, $path);		
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
    	$items = preg_grep('/^([^.])/', scandir($path));
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
    	$allFiles['/'] = self::checkFiles($path);
    	$folders = self::getItems($path, 1);
    	if ($folders) {
    		foreach ($folders as $folder) {
    			$allFiles[$folder] = self::checkDir($folder, $path);		
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
}