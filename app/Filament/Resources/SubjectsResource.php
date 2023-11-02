<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectsResource\Pages;
use App\Filament\Resources\SubjectsResource\RelationManagers;
use App\Models\Strands;
use App\Models\Subjects;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectsResource extends Resource
{
    
    protected static ?string $model = Subjects::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static?string $navigationGroup = 'System management';


    public static function form(Form $form): Form
    
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Create subjects')
                ->description()
                ->schema([
                    TextInput::make('subjects')->required(),
                  Select::make('strands_id')
                  ->relationship(
                     name: 'strands',
                     titleAttribute: 'strands_name',
                     

                  )->native(false)
                  ->searchable()
                  ->preload()
                  ->required()
                  ,
                  Select::make('term')->native(false)
                  ->options([
                    11=>11,
                    12=>12
                  ])->label('Grade'),
                  Select::make('semester')
                  ->options([
                    '1st semester' => '1st semester',
                    '2nd semester' => '2nd semester'
                  ])->native(false)
                  ->required()  
                    
                ])
               
                ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subjects'),
                Tables\Columns\TextColumn::make('strands.strands_name')->label('Strands'),
                Tables\Columns\TextColumn::make('semester'),
                Tables\Columns\TextColumn::make('term')->label('Grade')
          
            ])
            ->filters([
             
                Tables\Filters\TrashedFilter::make()
                ->native(false)
                ,
               SelectFilter::make('strands_id')
               ->relationship(
                name: 'strands',
                titleAttribute: 'strands_name'
               )
               ->native(false)
               ->label('Strands')
               ,
               SelectFilter::make('term')->label("Grade")
               ->options([
                11=>11,
                12=>12
               ])->native(false)
               ,

             SelectFilter::make('semester')
             ->options([
                '1st semester' => '1st semester',
                '2nd semester' => '2nd semester'
             ])->native(false)
               
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubjects::route('/create'),
            'edit' => Pages\EditSubjects::route('/{record}/edit'),
        ];
    }    
}
