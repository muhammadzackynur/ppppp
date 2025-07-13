<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisOlahragaResource\Pages;
use App\Models\JenisOlahraga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// Import komponen Select
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class JenisOlahragaResource extends Resource
{
    protected static ?string $model = JenisOlahraga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                // --- PERUBAHAN UTAMA DI SINI ---
                // Mengganti TextInput menjadi Select untuk Kategori
                Select::make('kategori')
                    ->options([
                        'Kekuatan' => 'Kekuatan',
                        'Kardio' => 'Kardio',
                        'Fleksibilitas' => 'Fleksibilitas',
                        'Keseimbangan' => 'Keseimbangan',
                        'Keterampilan/Rekreasi' => 'Keterampilan/Rekreasi',
                        'Fungsional' => 'Fungsional',
                        
                    ])
                    ->required()
                    ->searchable() // Opsional: membuat dropdown bisa dicari
                    ->placeholder('Pilih kategori olahraga'), // Opsional: teks placeholder

                TextInput::make('durasi_menit')
                    ->required()
                    ->numeric()
                    ->label('Durasi (menit)'),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('jenis-olahraga')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->square(),
                
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('kategori')
                    ->searchable(),
                TextColumn::make('durasi_menit')
                    ->sortable()
                    ->label('Durasi (menit)'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
