<?php

namespace App\Filament\Resources;

use App\Models\JenisOlahraga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\JenisOlahragaResource\Pages;

class JenisOlahragaResource extends Resource
{
    protected static ?string $model = JenisOlahraga::class;
    protected static ?string $navigationLabel = 'Jenis Olahraga';
    protected static ?string $navigationIcon = 'heroicon-o-fire';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\Textarea::make('deskripsi'),
            Forms\Components\Select::make('kategori')->options([
                'Kardio' => 'Kardio',
                'Kekuatan' => 'Kekuatan',
                'Fleksibilitas' => 'Fleksibilitas',
                'Campuran' => 'Campuran',
            ])->required(),
            Forms\Components\TextInput::make('durasi_menit')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama')->searchable(),
            Tables\Columns\TextColumn::make('kategori'),
            Tables\Columns\TextColumn::make('durasi_menit'),
        ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListJenisOlahragas::route('/'),
        'create' => Pages\CreateJenisOlahraga::route('/create'),
        'edit' => Pages\EditJenisOlahraga::route('/{record}/edit'),
    ];
}

}
