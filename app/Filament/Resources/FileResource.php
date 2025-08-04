<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('type')
                ->label('Jenis File')
                ->options([
                    'image' => 'Gambar',
                    'video' => 'Video',
                ])
                ->required()
                ->reactive(),

            FileUpload::make('path')
                ->label('Unggah Gambar')
                ->directory('uploads')
                ->image()
                ->visible(fn ($get) => $get('type') === 'image'),

            FileUpload::make('path')
                ->label('Unggah Video')
                ->directory('uploads')
                ->acceptedFileTypes(['video/mp4'])
                ->visible(fn ($get) => $get('type') === 'video'),

            Textarea::make('description')
                ->nullable()
                ->label('Deskripsi')
                ->rows(3),

            DatePicker::make('date')
                ->nullable()
                ->label('Tanggal'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('type'),
            Tables\Columns\ImageColumn::make('path')
                ->label('Preview'),
            Tables\Columns\TextColumn::make('description')->label('Deskripsi')->limit(40)->wrap(),
            Tables\Columns\TextColumn::make('date')->label('Tanggal')->date('d M Y'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Diunggah'),
        ])
        ->filters([])
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
            'index' => Pages\ListFiles::route('/'),
            'create' => Pages\CreateFile::route('/create'),
            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}
