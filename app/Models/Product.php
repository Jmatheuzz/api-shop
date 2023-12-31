<?php 
  
namespace App\Models; 
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
  
class Product extends Model 
{ 
    use HasFactory; 
  
    /** 
     * Os atributos que podem ser atribuídos em massa. 
     *   
     * @var array 
     */ 
    protected $fillable = [ 
        'name', 'details', 'value', 'category', 'user'
    ];
}