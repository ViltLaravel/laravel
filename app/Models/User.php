<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DB;
use App\Models\FreelancerSkill;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'attachment',
        'dob',
        'phone',
        'address',
        'status',
        'role',
        'gender',
        'salary'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified' => 'boolean',
    ];

    public function showAdmin() {
        return $this->select('*')->where('role', '=', 'admin')->get();
    }

    public function showEmployer(){
        return $this->select('*')->where('role', '=', 'employer' )->get();
    }

    public function showFreelancer(){
        return $this->select('*')->where('role', '=', 'freelancer' )->get();
    }

    public function userStatus(){
        return $this->select('status')->first();
    }

    public function insertUser($data){
        return $this->create($data);
    }

    public function editUser($id){
        return $this->select('*')->whereid($id)->first();
    }

    public function updateUser($id, $data){
        $update = $this->findOrFail($id);
        $update->update($data);

        return $update;
    }

    public function deleteUser($id){
        $delete = $this->find($id);
        $delete->delete($id);

        return $delete;
    }






    public function freelancer_skills()
    {
        return $this->hasMany(FreelancerSkill::class);
    }


    public function freelancerlists()
    {
        return $this->hasOne(freelancerlists::class);
    }

    public function freelancer_comment()
    {
        return $this->hasMany(FreelancerComment::class);
    }

    public function employer_comment()
    {
        return $this->hasMany(EmployerComment::class);
    }
}
