<?php

namespace App\View\Components\me;

use Closure;
use App\Models\Branch;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BranchComponent extends Component
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
        $branches=Branch::where('status',1)->take(2)->get();
        return view('components.me.branch-component',compact('branches'));
    }
}
