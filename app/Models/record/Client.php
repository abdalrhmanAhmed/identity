<?php

namespace App\Models\record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array(
        'full_name_en',
        'full_name_ar',
        'father_national_no',
        'b_date',
        'gender',
        'b_certify_no',
        'public_addres',
        'id_workplace',
        'id_social_situation',
        'id_blood_type',
        'id_birth_place',
        'id_profession',
        'id_country_births',
        'id_education',
        'id_pro_classification',
        'id_religion',
        'phone_no',
        'id_dna',
        'id_bank_acount',
    );

    // public function local(){
    //     return $this->hasMany(locale::class,'id','local_id');
    // }
}
