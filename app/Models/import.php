<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class import extends Model
{
    use HasFactory;
    protected $table = 'log_activity';

    protected $primaryKey = 'id';
    protected $guarded =[];
    // protected $fillable = [
    //     'id',
    //     'case_id',
    //     'message',
    //     'note',
    //     'type',
    //     'type_id',
    //     'created_by',
    //     'created',
    //     'pkid',
    //     'updated_at',
    //     'created_at',
    // ];

    public function importToDb(){
        $path = resource_path('pending-files/*.csv');

        $g = glob($path);

        foreach(array_slice($g ,0,1) as $file){
            $data =array_map('str_getcsv' ,file($file));
            // var_dump($data[4500]);
            foreach($data as $row){
                // var_dump($row[0]);
                // $import = import::firstOrNew(array('id' => $row[1]));
                $import =new import();
                $import->id = $row[0];
                $import->case_id = $row[1];
                $import->message = $row[2];
                $import->note = $row[3];
                $import->type = $row[4];
                $import->type_id = $row[5];
                $import->created_by = $row[6];
                $import->created = $row[7];
                $import->pkid = $row[8];
                $import->save();
                // // dd($row);
            //     self::updateOrCreate([
            //        'log_id'=>'0',
            //     ],[
            //         'id' => $row[0],
            //         'case_id' => $row[1],
            //         'message' => $row[2],
            //        'note' => $row[3],
            //        'type' => $row[4],
            //        'type_id' => $row[5],
            //        'created_by' => $row[6],
            //        'created' => $row[7],
            //        'pkid' => $row[8],
            //     ]
            // );
            }
            unlink($file);
        }
    }
}
