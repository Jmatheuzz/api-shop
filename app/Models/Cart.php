<?php 
  
namespace App\Models; 
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Cart extends Model 
{ 
    use HasFactory; 
  
    /** 
     * Os atributos que podem ser atribuídos em massa. 
     *   
     * @var array 
     */ 
    protected $fillable = [ 
        'price', 'amount', 'product', 'user'
    ];
    
    public $timestamps = false;

}