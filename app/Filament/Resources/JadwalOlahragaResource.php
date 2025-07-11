<?php

namespace App\Filament\Resources;

use App\Models\JadwalOlahraga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\JadwalOlahragaResource\Pages;

class JadwalOlahragaResource extends Resource
{
    protected static ?string $model = JadwalOlahraga::class;
    protected static ?string $navigationLabel = 'Jadwal Olahraga';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('olahraga_id')
                ->label('Jenis Olahraga')
                ->relationship('olahraga', 'nama')
                ->required(),
            Forms\Components\DatePicker::make('tanggal')->required(),
            Forms\Components\TimePicker::make('waktu')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('olahraga.nama')->label('Jenis Olahraga'),
            Tables\Columns\TextColumn::make('tanggal'),
            Tables\Columns\TextColumn::make('waktu'),
        ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListJadwalOlahragas::route('/'),
        'create' => Pages\CreateJadwalOlahraga::route('/create'),
        'edit' => Pages\EditJadwalOlahraga::route('/{record}/edit'),
    ];
}

}
