<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Model book
*/
class Book extends Model
{
	protected $fillable = ['title','author','isbn'];
}