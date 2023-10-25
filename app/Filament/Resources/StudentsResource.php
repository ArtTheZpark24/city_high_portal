<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Models\Students;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\FormsComponent;
use Filament\Support\View\Components\Modal;
use Illuminate\Database\Eloquent\Model;

class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $recordTitleAttribute = 'firstname';
    protected static?string $navigationGroup = 'Teachers/Students';

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
        
               Forms\Components\Section::make('')
               ->description('')
               ->schema([
                TextInput::make('LRN')->label('LRN')->required()->unique()->rule('numeric'),
                TextInput::make('firstname')->required()->minLength(2)->maxLength(255),
                TextInput::make('lastname')->required()->minLength(2)->maxLength(255),
                TextInput::make('middlename')->required()->minLength(2)->maxLength(255),
                DatePicker::make('birthdate'),
             
                Select::make('gender')->options([   'male' => 'Male','female' => 'Female',]) ->required()
                ->native(false)
                ,
                TextInput::make('address')->required()->maxLength(255),
                TextInput::make('contact')->required()->rules('numeric'),
                TextInput::make('email')->required()->maxLength(255)->unique(),
                TextInput::make('parent/guardian')->required()->minLength(2)->maxLength(255),
                TextInput::make('parent/guardian-contact')->required()->rule('numeric'),
              
                ])->columns(3),
                

               ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('LRN')->label('LRN'),
                Tables\Columns\TextColumn::make('firstname'),
                Tables\Columns\TextColumn::make('lastname'),
                Tables\Columns\TextColumn::make('middlename'),
                Tables\Columns\TextColumn::make('birthdate'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('address'),
          
            ])
            ->filters([
                //
                Tables\Filters\TrashedFilter::make()
                ->native(false)
                ,
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->label('Delete')->icon('heroicon-o-trash'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }    

   public static function getGlobalSearchResultDetails(Model $record): array
   {
    return [
        "LRN" => $record->LRN,
"Firstname" =>$record->firstname,
"Lastname" =>$record->lastname,

    ];
   }
   public static function getGloballySearchableAttributes(): array
   {
    return ['firstname', 'lastname' , 'LRN'];
   }
   public static function getGlobalSearchResultActions(Model $record): array
   {
 
    return [
     Action::make(name: 'View')
     ->iconButton()
     ->icon(icon: 'heroicon-o-eye')
      ->url(static::getUrl('edit', ['record' => $record])),

     
     
    ];
   }
}
