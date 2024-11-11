<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
// use App\Models\User;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */

     public $title;
     public $user;
 
     public function __construct($title = 'Default Title', $user = null)
     {
         $this->title = $title;
         $this->user = $user;
     }
 
     public function render()
     {
         return view('components.navbar');
     }
}
