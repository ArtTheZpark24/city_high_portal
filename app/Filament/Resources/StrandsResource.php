<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrandsResource\Pages;
use App\Filament\Resources\StrandsResource\RelationManagers;
use App\Models\Strands;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StrandsResource extends Resource
{
    protected static ?string $model = Strands::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Section::make('')
                ->description()
                ->schema([

                    TextInput::make('strands_name')->label('Add strands')->required()->unique()
                  
                ])->columns(2)
               
            ]);
          
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              
                Tables\Columns\TextColumn::make('strands_name'),
                
                //
              
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
                ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
            Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
       
                    Tables\Actions\DeleteBulkAction::make()
                    ->icon('heroicon-o-trash'),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    
                    Tables\Actions\RestoreBulkAction::make(),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                ->createAnother(true),
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
            'index' => Pages\ListStrands::route('/'),
            'create' => Pages\CreateStrands::route('/create'),
            'edit' => Pages\EditStrands::route('/{record}/edit'),
        ];
    }    
}
