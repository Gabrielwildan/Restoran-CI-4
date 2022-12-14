<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_M extends Model
{
    protected $table = 'tblmenu';
    protected $primaryKey = 'idmenu';
    protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];

    protected $validationRules    = [
        'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
        'harga' => 'numeric'
    ];
    protected $validationMessages = [
        'menu' => [
            'alpha_numeric_space' => 'you cannot use symbols',
            'min_length' => 'atleast 3 digits',
            'is_unique' => 'data already existed',
        ],

        'harga' => [
            'numeric' => 'you can only use numbers',
        ]
    ];
}
