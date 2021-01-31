<?php namespace App\Models\Customers;
use CodeIgniter\Model;
 
class CustomerModel extends Model
{
    protected $table    = 'app_customers';
    protected $primaryKey   = 'pk_id';

    protected $returnType   = 'array';

    protected $allowedFields    = ['firstname', 'lastname', 'username', 'password_hash', 'email', 'phone'];

    protected $validationRules  = [
        'firstname' => 'required',
        'lastname'  => 'required',
        'username'  => 'required|alpha_numeric_space|min_length[3]|is_unique[app_customers.username]',
        'email'     => 'required|valid_email|is_unique[app_customers.email]',
        'password_hash'  => 'required|min_length[8]',
        'phone'     => 'required|min_length[11]',
    ];

    protected $validationMessages   = [
        'email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
            'required'  => 'Email is required'
        ],
        'username'  => [
            'is_unique' => 'Sorry. That Username has already been taken. Please choose another.',
            'required'  => 'Username is required',
            'min_length' => 'Username must be 3 characters',
        ],
        'password_hash'  => [
            'min_length' => 'Password must be 8 characters',
            'required'   => 'Password is required',
        ],  
        'phone' => [
            'min_length' => 'Phone Number must be 11 digits',
            'required'   => 'Phone Number is required',
        ],      
    ];

    protected $skipValidation   = false;
}
?>