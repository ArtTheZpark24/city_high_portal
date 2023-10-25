<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnrollmentResource\Pages;
use App\Filament\Resources\EnrollmentResource\RelationManagers;
use App\Models\Enrollment;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\search;
use function Laravel\Prompts\select;

class EnrollmentResource extends Resource
{
    protected static ?string $model = Enrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    protected static?string $navigationGroup = 'System management';

    public static function form(Form $form): Form


    {
       
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->description()
                ->schema([
                   Select::make('students_id')
                   ->relationship(
                    name: 'students',
                  titleAttribute: 'firstname',
                 

                    


                   )     ->searchable(['firstname', 'lRN', 'email', 'lastname'])
                   ->placeholder('Search by Name, LRN, Lastname or Email')
                   
                   ->editOptionForm([
                    Forms\Components\TextInput::make('firstname'),
                    Forms\Components\TextInput::make('lastname'),
                    Forms\Components\TextInput::make('LRN')->label('LRN'),
                   

                    
                   ])
               
                
                
                  
                   ->native(false),
                   Select::make('strands_id')
                   ->relationship(name:'strands', titleAttribute:'strands_name')
                   ->native(false)
                   ->placeholder('Select a strands'),
                   Select::make('semester')
                   ->label('Semester')
                   ->options([
                       '1st semester' => '1st semester',
                       '2nd semester' => '2nd semester',
                   ])
                   ->placeholder('Select a semester')
                   ->native(false)
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('students.firstname')->label('Firstname'),
                Tables\Columns\TextColumn::make('students.lastname')->label('Lastname'),
                Tables\Columns\TextColumn::make('students.LRN')->label('LRN'),
                Tables\Columns\TextColumn::make('strands.strands_name'),
               Tables\Columns\TextColumn::make('semester')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEnrollments::route('/'),
            'create' => Pages\CreateEnrollment::route('/create'),
            'edit' => Pages\EditEnrollment::route('/{record}/edit'),
        ];
    }    
}
