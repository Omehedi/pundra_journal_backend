<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class TeamMember extends Model
{
    use HasFactory;
    protected $table='journal_team_members';
    protected $fillable = ['name', 'designation_primary', 'designation_secondary', 'qualifications', 'institution', 'address', 'image','email','phone','status'];
    public function validate($input)
    {
        return Validator::make($input, [
            'name' => 'required',
            'designation_primary' => 'required',
            'designation_secondary' => '',
            'qualifications' => 'required',
            'institution' => 'required',
            'address' => 'required',
            'image' => '',
            'email' => '',
            'phone' => '',
            'status' => '',
        ]);
    }
}