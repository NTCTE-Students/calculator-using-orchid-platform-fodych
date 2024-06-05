<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layouts\Rows;

class ConverterLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Select::make('unit_from')
                ->title('Из какой велчены будет производится конвертация')
                ->options([
                    'meters' => 'метры',
                    'kilometers' => 'километры',
                    'grams' => 'гр',
                    'kilograms' => 'кг',
                    'celsius' => 'цельсия',
                    'fahrenheit' => 'фаренгейт',
                ]),

            Input::make('value')
                ->title('Число')
                ->type('number'),

            Button::make('Конвертировать')
                ->method('convert')
        ];
    }
}
