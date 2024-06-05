<?php
namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use App\Orchid\Layouts\ConverterLayout;

class ConverterScreen extends Screen
{
    public $name = 'Конветатор велечин';

    public $description = 'Преобразование между различными физическими единицами';

    public function query(): array
    {
        return [];
    }

    public function commandBar(): array
    {
        return [];
    }

    public function layout(): array
    {
        return [
            ConverterLayout::class,
        ];
    }

    public function convert(Request $request)
    {
        $unit_from = $request->input('unit_from');
        $value = $request->input('value');
        $result = [];

        switch ($unit_from) {
            case 'meters':
                $result['километры'] = $value / 1000;
                break;
            case 'kilometers':
                $result['метры'] = $value * 1000;
                break;
            case 'grams':
                $result['кг'] = $value / 1000;
                break;
            case 'kilograms':
                $result['гр'] = $value * 1000;
                break;
            case 'celsius':
                $result['фаренгейт'] = $value * 9/5 + 32;
                break;
            case 'fahrenheit':
                $result['цельсия'] = ($value - 32) * 5/9;
                break;
            default:
                Alert::error('что ты вводишь придурок???');
                return;
        }

        $resultString = implode(', ', array_map(
            fn($key, $value) => "$key: $value",
            array_keys($result),
            $result
        ));

        Alert::info('Преобразованные значения в ' . $resultString);
    }
}
