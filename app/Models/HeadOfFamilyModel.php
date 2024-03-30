<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

use App\Models\FamilyMemberModel;


class HeadOfFamilyModel extends Model
{
    use HasFactory;
    protected $table = "head_of_families";
    public function getNameAttribute()
    {
        return "{$this->fname} {$this->lname}";
    }
    public function getHIdAttribute()
    {
        return Crypt::encrypt($this->id);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMemberModel::class,'head_id');
    }
}
