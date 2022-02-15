<?php

namespace App\Http\Controllers\Desktop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Desktop\Foundation\FoundationResource;
use App\Http\Resources\DictionaryTablet\ArabicDictionaryResource;
use App\Models\ArabicDictionary;
use App\Models\Foundation;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use ZipArchive;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class JsonFileController extends Controller
{

    public function jsonFile()
    {
        $table =new FoundationResource(Foundation::with('translation')->first());
        $table= $table->toJson(JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        $filename = "khrabaDb.json";
        File::put($filename,$table);;
        $headers = array('Content-type'=> 'application/json');
        return response()->download($filename,'khrabaDb.json',$headers);
    }

    public function zipFile()
    {
        $zip = new ZipArchive();
        $fileName = 'khrabaZip.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)== TRUE)
        {
            $files =File::allFiles(public_path('uploads'));
            foreach ($files as  $key => $file){
                $relativeName = $file->getRelativePathname();
                $zip->addFile($file, $relativeName);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }

    public function dictionaryJsonFile()
    {
        $col1= ArabicDictionaryResource::collection(ArabicDictionary::where('column', 1)->wherehas('foundation' , function($q){
            return $q->where('foundation_id', 1);
       })->get());
        $col2=ArabicDictionaryResource::collection(ArabicDictionary::where('column', 2)->wherehas('foundation' , function($q){
            return $q->where('foundation_id', 1);
       })->get());

        $table= [
            'col1' => $col1,
            'col2' => $col2,
        ];

        $table= json_encode($table,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        $filename = "dicDB.json";
        File::put($filename,$table);
        $headers = array('Content-type'=> 'application/json');
        return response()->download($filename,'dicDB.json',$headers);
    }
}
