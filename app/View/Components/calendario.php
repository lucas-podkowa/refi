<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class calendario extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /*  render() muestra el contenido que se encuentra dentro de la vista retornada  */
    public function render(): View|Closure|string
    {
        return view('components.refi-calendario');
    }
}

// Http/View/Components
//definir la clase de un componente utiliza na nomenclatura camelCase (AppLayout)

// resourses/view/layouts
//llamar a un componente desde una vista sigue la convencion kebak-case: nombres en minuscula separado con guiones (app-layoud)
