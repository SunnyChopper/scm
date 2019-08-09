<?php

namespace App\Custom;

use Storage;
use Response;

class UploadsHelper {
	
	/*
	 *
	 *	Def: Uploads a file to the local server
	 *	Args: 	request -> request,
	 * 			directory -> string
	 *	Return: URL path to file
	 *
	 */
	public static function uploadFileLocally($request, $directory) {
		return $request->file('file')->storeAs($directory, $request->file('file')->getClientOriginalName());
	}

	public static function getLocalFilePath($filename) {
		return Storage::url($filename);
	}

	public static function downloadFile($directory, $filename) {
		$path = storage_path() . '/app/' . $directory . "/" . $filename;
		if (file_exists($path)) {
	        return Response::download($path);
	    }
	}

	public static function getFile($directory, $filename) {
		return Storage::get($directory, $filename);
	}

}

?>