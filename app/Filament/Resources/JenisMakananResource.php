<?php

namespace App\Filament\Resources;

use App\Models\JenisMakanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\JenisMakananResource\Pages;

class JenisMakananResource extends Resource
{
    protected static ?string $model = JenisMakanan::class;
    protected static ?string $navigationLabel = 'Jenis Makanan';
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\Textarea::make('deskripsi'),
            Forms\Components\TextInput::make('kalori_per_porsi')->numeric(),
            Forms\Components\Select::make('kategori')->options([
                'Sarapan' => 'Sarapan',
                'Makan Siang' => 'Makan Siang',
                'Makan Malam' => 'Makan Malam',
                'Camilan' => 'Camilan',
            ])->required(),
            Forms\Components\Select::make('cocok_untuk_diet')->options([
                'Rendah Karbo' => 'Rendah Karbo',
                'Rendah Lemak' => 'Rendah Lemak',
                'Vegan' => 'Vegan',
                'Normal' => 'Normal',
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama')->searchable(),
            Tables\Columns\TextColumn::make('kategori'),
            Tables\Columns\TextColumn::make('kalori_per_porsi'),
            Tables\Columns\TextColumn::make('cocok_untuk_diet'),
        ]);
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListJenisMakanans::route('/'),
        'create' => Pages\CreateJenisMakanan::route('/create'),
        'edit' => Pages\EditJenisMakanan::route('/{record}/edit'),
    ];
}

}
