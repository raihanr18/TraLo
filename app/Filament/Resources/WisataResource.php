<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WisataResource\Pages;
use App\Filament\Resources\WisataResource\RelationManagers;
use App\Models\kategori;
use App\Models\Wisata;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class WisataResource extends Resource
{
    protected static ?string $model = Wisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori_id')
                    ->label('Kategori')
                    ->options(kategori::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                    FileUpload::make('foto')
                    ->disk('public')  // Menyimpan di disk 'public'
                    ->directory('kategori-foto')  // Menyimpan dalam folder 'kategori-foto'
                    ->image()
                    ->required()
                    ->maxSize(5 * 1024)  // Maksimal ukuran file 5MB
                    ->disk('public'),
                Forms\Components\Textarea::make('deskripsi')
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                    ->required(),
                Forms\Components\TextInput::make('harga')
                    ->required(),
                Forms\Components\TimePicker::make('waktu_buka')
                    ->required(),
                Forms\Components\TimePicker::make('waktu_tutup')
                    ->required(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori_id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('foto')
                    ->formatStateUsing(fn ($state) => $state ? '<img src="' . Storage::url($state) . '" width="100" height="100">' : 'No image')
                    ->html()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('lokasi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('harga')
                    ->sortable(),
                TextColumn::make('waktu_buka')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('waktu_tutup')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kontak')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWisatas::route('/'),
            'create' => Pages\CreateWisata::route('/create'),
            'edit' => Pages\EditWisata::route('/{record}/edit'),
        ];
    }
}
