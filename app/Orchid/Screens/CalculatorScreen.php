<?php
namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use App\Orchid\Layouts\CalculatorLayout;

class CalculatorScreen extends Screen
{
    public $name = 'Калькутор';

    public $description = 'калькулятор двух чисел!';

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
            CalculatorLayout::class,
        ];
    }

    public function calculate(Request $request)
    {
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $operation = $request->input('operation');
        $result = null;

        switch ($operation) {
            case '+':
                $result = $number1 + $number2;
                break;
            case '-':
                $result = $number1 - $number2;
                break;
            case '*':
                $result = $number1 * $number2;
                break;
            case '/':
                if ($number2 != 0) {
                    $result = $number1 / $number2;
                } else {
                    Alert::error('мы не любим ноль!');
                    return;
                }
                break;
            case '%':
                $result = $number1 % $number2;
                break;
            case '//':
                if ($number2 != 0) {
                    $result = intdiv($number1, $number2);
                } else {
                    Alert::error('мы не любим ноль!!!');
                    return;
                }
                break;
            case '**':
                $result = $number1 ** $number2;
                break;
            case 'sqrt':
                $result = sqrt($number1);
                break;
            case 'log':
                $result = log($number1);
                break;
            case 'sin':
                $result = sin(deg2rad($number1));
                break;
            case 'cos':
                $result = cos(deg2rad($number1));
                break;
            case 'tan':
                $result = tan(deg2rad($number1));
                break;
            default:
                Alert::error('Что ты вводишь дурак?');
                return;
        }

        Alert::info('Результат: ' . $result);
    }
}
