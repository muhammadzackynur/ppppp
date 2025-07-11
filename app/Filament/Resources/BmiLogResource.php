<?php

namespace App\Filament\Resources;

use App\Models\BmiLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\BmiLogResource\Pages;

class BmiLogResource extends Resource
{
    protected static ?string $model = BmiLog::class;
    protected static ?string $navigationLabel = 'BMI Log';
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\DatePicker::make('tanggal')->required(),
            Forms\Components\TextInput::make('berat_kg')->numeric()->required(),
            Forms\Components\TextInput::make('tinggi_cm')->numeric()->required(),
            Forms\Components\TextInput::make('bmi')->numeric()->required(),
            Forms\Components\TextInput::make('kategori')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('tanggal'),
            Tables\Columns\TextColumn::make('berat_kg'),
            Tables\Columns\TextColumn::make('tinggi_cm'),
            Tables\Columns\TextColumn::make('bmi'),
            Tables\Columns\TextColumn::make('kategori'),
        ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListBmiLogs::route('/'),
        'create' => Pages\CreateBmiLog::route('/create'),
        'edit' => Pages\EditBmiLog::route('/{record}/edit'),
    ];
}

}
