<?php
namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Rows;

class CalculatorLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Input::make('number1')
                ->title('Введите первое число!')
                ->type('number'),

            Input::make('number2')
                ->title('Введите первое число!')
                ->type('number'),

            Input::make('operation')
                ->title('Выберите что хотите сделать?')
                ->type('text')
                ->help('Available operations: +, -, * (умножение), / (деление), % (деление с остатком), //, ** (степень), sqrt (корень), log, sin, cos, tan'),

            Button::make('Посчитать!')
                ->method('calculate')
        ];
    }
}

