<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
class Ward extends Model
{
    public $timestamps = false;

    public function slike()
    {
        $slike = [];
        $filesInFolder = \File::files(storage_path('app/public/uploads/nalazi/'.$this->map_name));

        foreach($filesInFolder as $path)
        {
            $slike[] = pathinfo($path)['basename'];
        }
        return $slike;
    }


}
