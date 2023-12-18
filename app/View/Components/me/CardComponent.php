<?php

namespace App\View\Components\me;


use Closure;
use App\Models\Card;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CardComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(isset(Auth::user()->id))
        {
            $user_id=Auth::user()->id;
            $cards=Card::where('user_id',$user_id)->where('status','penning')->get();
            return view('components.me.Card-component',compact('cards'));
        }
        else
        {
            return view('components.me.Card-component');
        }


    }
}
